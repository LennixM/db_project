CREATE TABLE client(
  first_name CHAR(40),
  last_name CHAR(40),
  client_ID INT NOT NULL AUTO_INCREMENT,
  phone_number INT,
  email VARCHAR(255),
  password VARCHAR(255),
  PRIMARY KEY(client_ID)
);

CREATE TABLE accomodation(
  name VARCHAR(255),
  ac_ID INT NOT NULL AUTO_INCREMENT,
  stars INT,
  description text,
  PRIMARY KEY(ac_ID)
);

CREATE TABLE location(
  l_ID INT NOT NULL AUTO_INCREMENT,
  zip_code INT,
  street VARCHAR(255),
  city CHAR(40),
  state CHAR(40),
  country VARCHAR(255),
  PRIMARY KEY(l_ID)
);

CREATE TABLE hotel(
  ac_ID INT,
  room_service BOOLEAN,
  parking BOOLEAN,
  PRIMARY KEY(ac_ID),
  FOREIGN KEY(ac_ID) REFERENCES accomodation(ac_ID) on delete cascade
);

CREATE TABLE hostel(
  ac_ID INT,
  kitchen BOOLEAN,
  common_room BOOLEAN,
  PRIMARY KEY(ac_ID),
  FOREIGN KEY(ac_ID) REFERENCES accomodation(ac_ID) on delete cascade
);

CREATE TABLE motel(
  ac_ID INT,
  num_parking INT,
  PRIMARY KEY(ac_ID),
  FOREIGN KEY(ac_ID) REFERENCES accomodation(ac_ID) on delete cascade
);

CREATE TABLE resort(
  ac_ID INT,
  theme VARCHAR(255),
  num_parking INT,
  room_service BOOLEAN,
  PRIMARY KEY(ac_ID),
  FOREIGN KEY(ac_ID) REFERENCES accomodation(ac_ID)
);

CREATE TABLE rooms(
  room_ID INT NOT NULL AUTO_INCREMENT,
  cost FLOAT,
  num_rooms INT,
  bed_type VARCHAR(100),
  PRIMARY KEY(room_ID)
);

CREATE TABLE single(
  room_ID INT,
  PRIMARY KEY(room_ID),
  FOREIGN KEY(room_ID) REFERENCES rooms(room_ID) on delete cascade
);

CREATE TABLE double_r(
  room_ID INT,
  PRIMARY KEY(room_ID),
  FOREIGN KEY(room_ID) REFERENCES rooms(room_ID) on delete cascade
);

CREATE TABLE studio(
  room_ID INT,
  kitchen BOOLEAN,
  PRIMARY KEY(room_ID),
  FOREIGN KEY(room_ID) REFERENCES rooms(room_ID) on delete cascade
);

CREATE TABLE dormitory(
  room_ID INT,
  num_beds INT,
  unisex BOOLEAN,
  PRIMARY KEY(room_ID),
  FOREIGN KEY(room_ID) REFERENCES rooms(room_ID) on delete cascade
);

CREATE TABLE suites(
  room_ID INT,
  types VARCHAR(255),
  PRIMARY KEY(room_ID),
  FOREIGN KEY(room_ID) REFERENCES rooms(room_ID) on delete cascade
);

CREATE TABLE facilities(
  f_ID INT NOT NULL AUTO_INCREMENT,
  wifi BOOLEAN,
  name CHAR(40),
  opening_times TIME,
  closing_times TIME,
  PRIMARY KEY(f_ID)
);

CREATE TABLE restaurant(
  f_ID INT,
  name CHAR(40),
  cuisine VARCHAR(255),
  PRIMARY KEY(f_ID),
  FOREIGN KEY(f_ID) REFERENCES facilities(f_ID) on delete cascade
);

CREATE TABLE pool(
  f_ID INT,
  name CHAR(40),
  type CHAR(40),
  PRIMARY KEY(f_ID),
  FOREIGN KEY(f_ID) REFERENCES facilities(f_ID) on delete cascade
);

CREATE TABLE spa(
  f_ID INT,
  name CHAR(40),
  massage BOOLEAN,
  sauna BOOLEAN,
  thermal_baths BOOLEAN,
  PRIMARY KEY(f_ID),
  FOREIGN KEY(f_ID) REFERENCES facilities(f_ID) on delete cascade
);

CREATE TABLE gym(
  f_ID INT,
  name CHAR(40),
  classes TEXT,
  PRIMARY KEY(f_ID),
  FOREIGN KEY(f_ID) REFERENCES facilities(f_Id) on delete cascade
);

CREATE TABLE casino(
  f_ID INT,
  name CHAR(40),
  slot_machines BOOLEAN,
  table_games BOOLEAN,
  PRIMARY KEY(f_Id),
  FOREIGN KEY(f_Id) REFERENCES facilities(f_ID) on delete cascade
);

CREATE TABLE rating(
  r_ID INT NOT NULL AUTO_INCREMENT,
  stars INT,
  review TEXT,
  PRIMARY KEY (r_ID)
);

CREATE TABLE payment(
  payment_ID INT NOT NULL AUTO_INCREMENT,
  price INT,
  IBAN CHAR(22),
  creditcard_owner CHAR(80),
  expiration_date DATE,
  PRIMARY KEY(payment_ID)
);

CREATE TABLE booking(
  booking_ID INT NOT NULL AUTO_INCREMENT,
  num_people INT,
  arrival_date DATE,
  departure_date DATE,
  status BOOLEAN,
  PRIMARY KEY(booking_ID)
);

CREATE TABLE policy(
  policy_ID INT NOT NULL AUTO_INCREMENT,
  other_policies TEXT,
  checkin_date TIME,
  checkout_date TIME,
  cancellation_period INT,
  PRIMARY KEY(policy_ID)
);

/*RELATIONS START HERE*/

CREATE TABLE contains(
  ac_ID INT,
  room_ID INT,
  PRIMARY KEY(ac_ID,room_ID),
  FOREIGN KEY(ac_ID) REFERENCES accomodation(ac_ID),
  FOREIGN KEY(room_ID) REFERENCES rooms(room_ID)
);

CREATE TABLE submits(
  client_ID INT,
  ac_ID INT,
  PRIMARY KEY(ac_ID,client_ID),
  FOREIGN KEY(ac_ID) REFERENCES accomodation(ac_ID),
  FOREIGN KEY(client_ID) REFERENCES client(client_ID)
);

CREATE TABLE reserves(
  booking_ID INT,
  client_ID INT,
  ac_ID INT,
  PRIMARY KEY(ac_ID,booking_ID,client_ID),
  FOREIGN KEY(booking_ID) REFERENCES booking(booking_ID),
  FOREIGN KEY(client_ID) REFERENCES client(client_ID),
  FOREIGN KEY(ac_ID) REFERENCES accomodation(ac_ID)
);

CREATE TABLE pays(
  booking_ID INT,
  client_ID INT,
  payment_ID INT,
  PRIMARY KEY(booking_ID,client_ID,payment_ID),
  FOREIGN KEY(booking_ID) REFERENCES booking(booking_ID),
  FOREIGN KEY(client_ID) REFERENCES client(client_ID),
  FOREIGN KEY(payment_ID) REFERENCES payment(payment_ID)
);

CREATE TABLE cancels(
  policy_ID INT,
  booking_ID INT,
  client_ID INT,
  payment_ID INT,
  PRIMARY KEY(booking_ID,client_ID,payment_ID,policy_ID),
  FOREIGN KEY(booking_ID) REFERENCES booking(booking_ID),
  FOREIGN KEY(client_ID) REFERENCES client(client_ID),
  FOREIGN KEY(payment_ID) REFERENCES payment(payment_ID),
  FOREIGN KEY(policy_ID) REFERENCES policy(policy_ID)
);

CREATE TABLE has_policy(
  policy_ID INT,
  ac_ID INT,
  PRIMARY KEY(ac_ID, policy_ID),
  FOREIGN KEY (ac_ID) REFERENCES accomodation(ac_ID),
  FOREIGN KEY (policy_ID) REFERENCES policy(policy_ID)
);

CREATE TABLE is_at(
  l_ID INT,
  ac_ID INT,
  PRIMARY KEY(ac_ID, l_ID),
  FOREIGN KEY (ac_ID) REFERENCES accomodation(ac_ID),
  FOREIGN KEY (l_ID) REFERENCES location(l_ID)
);

CREATE TABLE has(
  ac_ID INT,
  f_ID INT,
  PRIMARY KEY(ac_ID, f_ID),
  FOREIGN KEY (ac_ID) REFERENCES accomodation(ac_ID),
  FOREIGN KEY (f_ID) REFERENCES facilities(f_ID)
);
