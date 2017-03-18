/**
* created: ThinhNH
*/

********************
Add timezone in da_user_profile ( dektrium )

************Mirgration Admin********
php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations

************Migration Role**********
php yii migrate --migrationPath=@yii/rbac/migrations

***************************************************
update prefix : dektrium\yii2-user\models

update prefix : namespace yii\rbac\DbManager
