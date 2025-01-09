# php_online_shop

### 表示方法
　http://localhost/shop_report/ctrl/user/

### 管理者（root）でMySqlへ接続する
```SQL
 cd C:\xampp\mysql\bin\
 mysql -u root -p
```

### データベース「db120#### 」を作成する
以下の####の部分は実際の学籍番号に置き換える
```SQL
create database db120####;
```

### 一般ユーザー「shopuser」
```SQL
create user 'shopuser'@'localhost' identified by 'shoppass';

grant all privileges on db120####.* to 'shopuser'@'localhost';

flush privileges;
```

### 一般ユーザーでlog in
```SQL
mysql -u shopuser -p;
```
