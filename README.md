Not stable see develop branch
created wit git-flow

Dependency
----------
	Liuggio/UserBundle uses the https://github.com/liip/LiipFunctionalTestBundle
	for some test shortcut and facilities.
	
	Or you install LIIP it or you remove the Test folder.


Install
----------


	git submodule add git@github.com:liuggio/UserBundle.git  src/Tvision/Bundles/UserBundle
	git submodule update --init
	(you need to switch to the develop branch?)

1) add to kernel  ... (you know how to do)

2) add to app/routing.yml

	# User/Group
	TvisionBundlesUserBundle:
	    resource: "@TvisionBundlesUserBundle/Resources/config/routing.yml"
	    prefix:   /

1) add into your project this security

app/security.yml
	
	security:
	    encoders:
	        Symfony\Component\Security\Core\User\User: plaintext
	
	    role_hierarchy:
	        ROLE_ADMIN:       ROLE_USER
	        ROLE_SUPER_ADMIN: [ROLE_USER, ROLE_ADMIN, ROLE_ALLOWED_TO_SWITCH]
	
	    providers:
	        in_memory:
	            users:
	                user:  { password: userpass, roles: [ 'ROLE_USER' ] }
	                admin: { password: adminpass, roles: [ 'ROLE_ADMIN' ] }
	        fos_user:
	            id: fos_user.user_manager
	
	    firewalls:
	        dev:
	            pattern:  ^/(_(profiler|wdt)|css|images|js)/
	            security: false
	
	        login:
	            pattern:  ^/secured/login$
	            security: false
	
	        secured_area:
	            pattern:    ^/secured/
	            provider:   in_memory
	            form_login:
	                check_path: /secured/login_check
	                login_path: /secured/login
	            logout:
	                path:   /secured/logout
	                target: /
	            #anonymous: ~
	            #http_basic:
	            #    realm: "Secured Ipsum Area"
	
	        fos_user:
	            pattern:    ^/user/
	            provider:   fos_user
	            form_login:
	                check_path: /user/login_check
	                login_path: /user/login
	            logout:
	                path:   /user/logout
	                target: /
	            anonymous: ~
	
	    access_control:
	        - { path: /secured/admin, roles: ROLE_ADMIN }
	        - { path: ^/user/login$, roles: IS_AUTHENTICATED_ANONYMOUSLY }
	        - { path: ^/user/register, roles: IS_AUTHENTICATED_ANONYMOUSLY }
	        - { path: ^/user$, roles: Is_AUTHENTICATED_ANONYMOUSLY }
	        - { path: ^/user/, roles: ROLE_USER }


2) load fixture

3) If you are not a Tvision user, you should modify the tempate

resources/view 
