#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Table: roles
#------------------------------------------------------------

CREATE TABLE `roles`(
        `id`       Int  Auto_increment  NOT NULL ,
        `role`     Varchar (30) NOT NULL
	,CONSTRAINT roles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE `users`(
        `id`          Int  Auto_increment  NOT NULL ,
        `firstname`   Varchar (50) NOT NULL ,
        `lastname`    Varchar (50) NOT NULL ,
        `password`    Varchar (60) NOT NULL ,
        `register_at Datetime` NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `email`     Varchar (150) NOT NULL,
        `role_id` Int NOT NULL
	,CONSTRAINT UK_user UNIQUE (email)
	,CONSTRAINT PK_users PRIMARY KEY (id)
	,CONSTRAINT FK_users_roles FOREIGN KEY (role_id) REFERENCES roles(id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: posts
#------------------------------------------------------------

CREATE TABLE `posts`(
        `id`          Int  Auto_increment  NOT NULL ,
        `title`        Varchar (150) NOT NULL ,
        `content`      Longtext NOT NULL ,
        `created_at   Datetime` NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `published_at Datetime` NOT NULL ,
        `updated_at   Datetime` NOT NULL ,
        `user_id`     Int NOT NULL
	,CONSTRAINT posts_PK PRIMARY KEY (id)

	,CONSTRAINT FK_posts_users FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: abonnements
#------------------------------------------------------------

CREATE TABLE `abonnements`(
        `id`        Int  Auto_increment  NOT NULL ,
        `abonnement` Varchar (150) NOT NULL,
CONSTRAINT abonnements_PK PRIMARY KEY (id)
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: cours
#------------------------------------------------------------
CREATE TABLE `cours`(
        `id`       Int  Auto_increment  NOT NULL ,
        `nameCours` Varchar (50) NOT NULL,
CONSTRAINT cours_PK PRIMARY KEY (id)
)ENGINE=InnoDB;
#------------------------------------------------------------
# Table: clients_courses
#------------------------------------------------------------
CREATE TABLE `clients_courses`(
        `id`        Int NOT NULL ,
        `id_clients` Int NOT NULL ,
        `date`       Datetime NOT NULL,
CONSTRAINT clients_courses_PK PRIMARY KEY (id,id_clients),
CONSTRAINT clients_courses_cours_FK FOREIGN KEY (id) REFERENCES cours(id),
CONSTRAINT clients_courses_clients0_FK FOREIGN KEY (id_clients) REFERENCES users(id)
)ENGINE=InnoDB;

