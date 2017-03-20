/*
CREATE TABLE `tp4`.`mail` (
  `author` NVARCHAR(30) NOT NULL,
  `message` NVARCHAR(300) NOT NULL);
  */

insert into mail(author, message)
	values('john', 'hello, world!');
insert into mail(author, message)
	values('alex', 'and you :)');
insert into mail(author, message)
	values('garry', 'wats up, gays?');
    
    
insert into user_info(user_info.name, login, pass, avatar, pol)
	values('ivan', 'abc', '123', 'uploads/1.jpg', 'male');
insert into user_info(user_info.name, login, pass, avatar, pol)
	values('inna', 'qwe', '456', 'uploads/2.jpg', 'famale');
insert into user_info(user_info.name, login, pass, avatar, pol)
	values('kevin', 'rty', '789', 'uploads/3.jpg', 'male');
    
delete from mail where message='dfg' or message='gas';