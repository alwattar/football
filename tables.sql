CREATE TABLE channels(
chan_id int(255) primary key auto_increment,
chan_name varchar(255) not null,
chan_logo varchar(255) not null,
chan_lang varchar(10) not null default 'ar'
)ENGINE=InnoDB default charset utf8;

CREATE TABLE commentor(
comm_id int(255) primary key auto_increment,
comm_name varchar(255) not null,
comm_country varchar(255) not null,
comm_chan int(255) not null,
FOREIGN KEY (comm_chan) references channels(chan_id)
)ENGINE=InnoDB default charset utf8;

CREATE TABLE nft(
nft_id int(255) primary key auto_increment,
nft_name varchar(255) not null,
nft_logo varchar(255) not null,
nft_num int(255) not null
)ENGINE=InnoDB default charset utf8;

CREATE TABLE clubs(
cl_id int(255) primary key auto_increment,
cl_name varchar(255) not null,
cl_country varchar(255) not null,
cl_logo varchar(255) not null
)ENGINE=InnoDB default charset utf8;


CREATE TABLE champs(
champ_id int(255) primary key auto_increment,
champ_name varchar(255) not null,
champ_loc varchar(255) not null,
champ_logo varchar(255) not null,
champ_date timestamp not null
)ENGINE=InnoDB default charset utf8;


CREATE TABLE matches(
mat_id int(255) primary key auto_increment,
mat_team1 varchar(255) not null,
mat_team2 varchar(255) not null,
mat_time timestamp not null,
mat_chan int(255) not null,
mat_comm int(255) not null,
mat_champ int(255) not null,
mat_address varchar(255) not null,
mat_note varchar(255) not null,
mat_status enum('0','1','2') not null default '0',
mat_lang varchar(255) not null default 'ar',
FOREIGN KEY (mat_chan) references channels(chan_id),
FOREIGN KEY (mat_comm) references commentor(comm_id),
FOREIGN KEY (mat_champ) references champs(champ_id)
)ENGINE=InnoDB default charset utf8;


CREATE TABLE players(
pl_id int(255) primary key auto_increment,
pl_name varchar(255) not null,
pl_nat varchar(255) not null,
pl_leng int(255) not null,
pl_chanum int(255) not null,
pl_goals int(255) not null,
pl_curclub int(255) not null,
pl_lastedit timestamp not null,
FOREIGN KEY (pl_curclub) references clubs(cl_id)
)ENGINE=InnoDB default charset utf8;


CREATE TABLE transfer(
mov_id int(255) primary key auto_increment,
mov_pl varchar(255) not null,
mov_club int(255) not null,
mov_sal int(255) not null,
mov_date timestamp,
FOREIGN KEY (mov_club) references clubs(cl_id)
)ENGINE=InnoDB default charset utf8;
