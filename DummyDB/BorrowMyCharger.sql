create database borrowmycharger;
use borrowmycharger;


create table home_owner (
	HOid INT AUTO_INCREMENT primary key,
	HOUserName VARCHAR(50),
	HOFullName VARCHAR(100),
	HOPassword VARCHAR(50)
    
);

insert into home_owner (HOid, HOUserName, HOFullName, HOPassword ) values (1, 'agoslin0', 'Aretha Goslin', '0Mq2W2');
insert into home_owner (HOid, HOUserName, HOFullName, HOPassword ) values (2, 'opointer1', 'Ody Pointer', 'fbz9GQq');
insert into home_owner (HOid, HOUserName, HOFullName, HOPassword) values (3, 'efahrenbach2', 'Elsey Fahrenbach', 'rHLRrQ');
insert into home_owner (HOid, HOUserName, HOFullName, HOPassword) values (4, 'tmurden3', 'Trenna Murden', 'VKLQYQ6WYMAY');
insert into home_owner (HOid, HOUserName, HOFullName, HOPassword) values (5, 'lfranies4', 'Lane Franies', '9JNgZHifMU4');
insert into home_owner (HOid, HOUserName, HOFullName, HOPassword) values (6, 'csweetsur5', 'Chrystal Sweetsur', 'd2Yy32m');
insert into home_owner (HOid, HOUserName, HOFullName, HOPassword) values (7, 'tnason6', 'Terri Nason', 'NDoeN68OY');
insert into home_owner (HOid, HOUserName, HOFullName, HOPassword) values (8, 'ikoch7', 'Inesita Koch', 'g5xzYEgi');
insert into home_owner (HOid, HOUserName, HOFullName, HOPassword) values (9, 'nscholey8', 'Noel Scholey', '1fHxykKTh');
insert into home_owner (HOid, HOUserName, HOFullName, HOPassword) values (10, 'rkarpfen9', 'Rochelle Karpfen', 'iv8obmCVu');


create table rental_user (
	RUid INT AUTO_INCREMENT primary key,
	RUUserName VARCHAR(50),
	RUFullName VARCHAR(50),
	RUPassword VARCHAR(50)
);

insert into rental_user (RUid, RUUserName, RUFullName, RUPassword) values (1, 'pnunnerley0', 'Pat Nunnerley', 'HlV3rOHncqF1');
insert into rental_user (RUid, RUUserName, RUFullName, RUPassword) values (2, 'aforder1', 'Alli Forder', '8xYajTlh');
insert into rental_user (RUid, RUUserName, RUFullName, RUPassword) values (3, 'edomleo2', 'Enid Domleo', 'CO7rDJ');
insert into rental_user (RUid, RUUserName, RUFullName, RUPassword) values (4, 'cbenton3', 'Catie Benton', 'ZLzxzC6');
insert into rental_user (RUid, RUUserName, RUFullName, RUPassword) values (5, 'akhristoforov4', 'Antoinette Khristoforov', 'Rkje5hPE');
insert into rental_user (RUid, RUUserName, RUFullName, RUPassword) values (6, 'cshyre5', 'Cindie Shyre', 'AvSWPu0R');
insert into rental_user (RUid, RUUserName, RUFullName, RUPassword) values (7, 'cbrocks6', 'Carole Brocks', 'NWvjwvR2h');
insert into rental_user (RUid, RUUserName, RUFullName, RUPassword) values (8, 'tpanyer7', 'Tessi Panyer', 'lh8WBPuK');
insert into rental_user (RUid, RUUserName, RUFullName, RUPassword) values (9, 'tpropper8', 'Trey Propper', 'ps1yvcOMQ');
insert into rental_user (RUid, RUUserName, RUFullName, RUPassword) values (10, 'glowde9', 'Graeme Lowde', '1tX5HLPUgo');


create table charging_point (
	id INT AUTO_INCREMENT primary key,
	lat VARCHAR(50),
	lng VARCHAR(50),
    address VARCHAR(50),
	price float,
	city VARCHAR(50),
    home_owner_id INT,
    
	CONSTRAINT fk_home_owner FOREIGN KEY(home_owner_id) references home_owner(HOid)
);
insert into charging_point (id, lat, lng, address, price, city, home_owner_id) values (1, 13.939297, 121.6397151, '2 Gale Circle', 4.38, 'Buan', 1);
insert into charging_point (id, lat, lng, address, price, city, home_owner_id) values (2, 16.8263127, 42.7344873, '53206 Pepper Wood Terrace', 2.69, 'Mizhirah', 2);
insert into charging_point (id, lat, lng, address, price, city, home_owner_id) values (3, 21.7960343, -79.9808143, '38 Sunnyside Hill', 4.41, 'Trinidad', 3);
insert into charging_point (id, lat, lng, address, price, city, home_owner_id) values (4, -4.269928, 138.0803529, '7651 Rockefeller Parkway', 1.29, 'Oepuah', 4);
insert into charging_point (id, lat, lng, address, price, city, home_owner_id) values (5, 60.8818611, 11.5610075, '1 East Circle', 1.4, 'Elverum', 5);
insert into charging_point (id, lat, lng, address, price, city, home_owner_id) values (6, 32.9454027, -117.2399868, '439 Declaration Trail', 2.97, 'Huya', 6);
insert into charging_point (id, lat, lng, address, price, city, home_owner_id) values (7, 27.3980151, -80.3714326, '6410 Duke Avenue', 6.64, 'Fort Pierce', 7);
insert into charging_point (id, lat, lng, address, price, city, home_owner_id) values (8, 29.181201, 110.138102, '2179 Hermina Place', 3.61, 'Luotaping', 8);
insert into charging_point (id, lat, lng, address, price, city, home_owner_id) values (9, 31.221239, 121.452273, '7 Vermont Alley', 4.49, 'Yixin', 9);
insert into charging_point (id, lat, lng, address, price, city, home_owner_id) values (10, 31.223128, 121.454382, '164 Rutledge Parkway', 2.72, 'Yixin', 10);


create table bookings (
	id INT AUTO_INCREMENT primary key,
	charging_point_id INT,
    rental_user_id INT,
    reserved_date date,
    reserved_time varchar(50),
    number_of_kwh float,
    total varchar(50),
    
	CONSTRAINT fk_rental_user_1 FOREIGN KEY(rental_user_id) references rental_user(RUid),
	CONSTRAINT fk_charging_point_1 FOREIGN KEY(charging_point_id) references charging_point(id)

);


