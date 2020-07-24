-- 建表
create table userdata(
    id int unsigned not null auto_increment,
    username 	varchar(50) not null,
    password	varchar(50) not null,
    regtime		int not null,
    admin		tinyint not null,
    primary key(id)
);
create table shopclass(
    id int unsigned not null auto_increment,
   	name	varchar(50) not null,
    primary key(id)
);
create table brand(
    id int unsigned not null auto_increment,
   	name varchar(50) not null,
    shopclass_id int not null,
    primary key(id)
);
create table shop(
    id int unsigned not null auto_increment,
   	name varchar(50) not null,
    price float  not null,
    stock int not null,
    upshelf tinyint not null,
    image varchar(100) not null,
    brand_id int not null,
    primary key(id)
);
create table orderstat(
    id int unsigned not null auto_increment,
   	name varchar(50) not null,
    primary key(id)
);
create table relation(
    id int unsigned not null auto_increment,
    realname varchar(50) not null,
    address varchar(200) not null,
    telephone varchar(20) not null,
    email varchar(50) not null,
    user_id int not null,
    primary key(id)
);
create table orderdata(
    id 			int unsigned not null auto_increment,
    code		varchar(50) not null,
    user_id 	int not null,
    shop_id 	int not null,
    num 		int not null,
    price		float not null,
    time		int not null,
    orderstat_id int not null,
    relation_id  int not null,
    primary key(id)
);
create table commit(
    id int unsigned not null auto_increment,
   	content text,
    user_id int not null,
    shop_id int not null,
    primary key(id)
);
-- userdata中插入用户数据
INSERT INTO `userdata` (`id`, `username`, `password`, `regtime`, `admin`) VALUES (NULL, 'user1', '123', UNIX_TIMESTAMP(), '0'), (NULL, 'user2', '123', UNIX_TIMESTAMP(), '0');
INSERT INTO `userdata` (`id`, `username`, `password`, `regtime`, `admin`) VALUES (NULL, 'user3', '123', UNIX_TIMESTAMP(), '0'), (NULL, 'user4', '123', UNIX_TIMESTAMP(), '0');
INSERT INTO `userdata` (`id`, `username`, `password`, `regtime`, `admin`) VALUES (NULL, 'user5', '123', UNIX_TIMESTAMP(), '0'), (NULL, 'admin', '123', UNIX_TIMESTAMP(), '1');