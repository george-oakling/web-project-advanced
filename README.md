# Nette Web Project Advanced

How to use
==========

`composer create-project george-oakling/web-project-advanced`


Benefits:
- preconfigured LESS and startup JS files in app/assets dir
- preconfigured BasePresenter with default WebLoader components
- clean HomepagePresenter templates
- preconfigured Phinx, which gets default params by two way parsing config.local.neon
- htaccess improvements (caching of static files, more options for DEFLATE)

TODO:
- BaseForm based on Nextras Forms Renderer
- Critical CSS first time extraction and showcase in head
- default deployment.ini
- on deploy, require special HTML page (maintenance), after deploy not (in www/index.php there should be a check for a file which is made by deployer, if there is one, require the maintenance page, if there is not one, start usual application startup process)
- create special deploying DeployPresenter, which starts database migrations and other useful things

