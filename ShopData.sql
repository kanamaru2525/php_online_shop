-- CREATE TABLE member (
--     id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '会員ID',
--     last_name VARCHAR(50) COMMENT '姓',
--     first_name VARCHAR(50) COMMENT '名',
--     age TINYINT UNSIGNED COMMENT '年齢',
--     login_id VARCHAR(50) COMMENT 'ログインID',
--     login_pass VARCHAR(255) COMMENT 'ログインパスワード',
--     postcode CHAR(8) COMMENT '郵便番号', -- ハイフンをなしの場合を想定
--     useraddress VARCHAR(100) COMMENT '住所',
--     mailaddress VARCHAR(100) COMMENT 'メールアドレス',
--     userpassword VARCHAR(255) COMMENT 'ユーザーのパスワード', -- 暗号化を想定
--     PRIMARY KEY (id)
-- );


CREATE TABLE member (
    id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '会員ID',
    name VARCHAR(20) COMMENT '名前',
    age TINYINT UNSIGNED COMMENT '年齢',
    login_id VARCHAR(50) COMMENT 'ログインID',
    login_pass VARCHAR(255) COMMENT 'ログインパスワード',
    telephone CHAR(13) COMMENT '電話番号', -- ハイフンをなしの場合を想定
    postcode CHAR(8) COMMENT '郵便番号', -- ハイフンをなしの場合を想定
    user_address VARCHAR(100) COMMENT '住所',
    mail_address VARCHAR(100) COMMENT 'メールアドレス',
    PRIMARY KEY (id)
);

INSERT INTO member (last_name, first_name, age, login_id, login_pass, postcode, useraddress, mailaddress, userpassword)
VALUES
('山田', '太郎', 25, 'yamada_t', 'password123', '123-4567', '東京都新宿区1-1-1', 'yamada.t@example.com', 'securepass1'),
('佐藤', '花子', 30, 'sato_h', 'pass456', '987-6543', '大阪府大阪市中央区2-2-2', 'sato.h@example.com', 'securepass2'),
('田中', '一郎', 28, 'tanaka_i', 'mypassword', '555-8888', '愛知県名古屋市西区3-3-3', 'tanaka.i@example.com', 'securepass3'),
('鈴木', '二郎', 22, 'suzuki_j', 'abc123', '111-2222', '北海道札幌市北区4-4-4', 'suzuki.j@example.com', 'securepass4'),
('高橋', '三郎', 35, 'takahashi_s', 'qwerty', '333-7777', '福岡県福岡市博多区5-5-5', 'takahashi.s@example.com', 'securepass5');


CREATE TABLE item (
    `item_id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品ID',
    `item_name` VARCHAR(50) NOT NULL COMMENT '商品名',
    `item_exp` TEXT NOT NULL COMMENT '商品説明',
    `item_price` MEDIUMINT UNSIGNED COMMENT '商品価格',
    `item_stock` MEDIUMINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '商品在庫',
    `category_id` TINYINT UNSIGNED COMMENT '商品カテゴリ',
    `sales_stop` BOOLEAN COMMENT '販売停止',
    `item_image` VARCHAR(100) COMMENT '商品画像のパス',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '作成日時',
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新日時',
    PRIMARY KEY (`item_id`),
    KEY `idx_category` (`category_id`)
);

INSERT INTO item (item_name, item_exp, item_price, item_stock, category_id, sales_stop, item_image)
VALUES
('カフェオレベース', '契約農家ロスヘラセセス100%使用したカフェオレベース',1600, 10, 4, FALSE, '1.jpg'),
('ガヨウマウンテン(200g)-フルシティロースト', '完全有機栽培-美味しいコクと甘味、後味があります',1350, 10, 2, FALSE, '2.jpg'),
('グァテマラ・サンセバスチャン農場(200g)-シティロースト', 'カップ・オブ・エスセレンスというカッピングの世界大会に何度も入賞してしまう実力派農家「サンセバスチャン」', 1560, 10, 1, FALSE, '3.jpg'),
('ケニア・キアンジル農園深焼き(200g)-フルシティロースト', 'すっきりとしたコクそして、美しい後味に優し～い甘味が口に広がります。', 1652, 30, 2, FALSE, '4.jpg'),
('スマトラタイガー(200g)-アイスコーヒ豆', '朝に最適なコーヒーです', 1460, 15, 3, TRUE, '5.jpg');



CREATE TABLE category (
    `category_id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'カテゴリID',
    `category_name` VARCHAR(100)  NOT NULL COMMENT 'カテゴリ名',
    PRIMARY KEY (category_id)
);

INSERT INTO category (category_id, category_name) VALUES (1, 'シティロースト');
INSERT INTO category (category_id, category_name) VALUES (2, 'フルシティロースト');
INSERT INTO category (category_id, category_name) VALUES (3, 'アイスコーヒー豆');
INSERT INTO category (category_id, category_name) VALUES (4, 'その他');

CREATE TABLE cart (
`user_id` MEDIUMINT UNSIGNED NOT NULL COMMENT 'ユーザID',
`item_id` MEDIUMINT UNSIGNED NOT NULL COMMENT '商品ID',
`item_num` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '個数',
PRIMARY KEY (user_id, item_id)
);

CREATE TABLE orders (
`order_id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '注文ID',
`user_id` MEDIUMINT UNSIGNED NOT NULL COMMENT 'ユーザID',
`item_id` MEDIUMINT UNSIGNED NOT NULL COMMENT '商品ID',
`item_num` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '個数',
`sales_price` MEDIUMINT UNSIGNED NOT NULL COMMENT '販売価格',
`order_date` DATE  NOT NULL COMMENT '注文日',
PRIMARY KEY (order_id)
);

CREATE TABLE admin (
    `id` VARCHAR(50) NOT NULL COMMENT 'admin',
    `pass` VARCHAR(50) NOT NULL COMMENT 'kanri',
    PRIMARY KEY (`id`)
);

INSERT INTO admin (id, pass) VALUES ('admin', 'kanri');

