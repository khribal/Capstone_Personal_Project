drop table if exists shift;
drop table if exists order_menu;
drop table if exists menu_items;
drop table if exists employee;
drop table if exists restaurant_location;
drop table if exists orders;
drop table if exists customer;

CREATE TABLE customer (
    id integer,
    fname varchar(50),
    lname varchar(50),
    email varchar(50),
    phone varchar(50),
    primary key (id)
)
ENGINE=INNODB;

CREATE TABLE orders (
    id integer,
    orderDate date,
    totalAmount float,
    customerID integer,
    primary key (id),
    foreign key (customerID) REFERENCES customer(id)
)
ENGINE=INNODB;

CREATE TABLE restaurant_location(
    id integer,
    rest_name varchar(50),
    address varchar(50),
    city varchar(50),
    state char(2),
    zipcode integer(5),
    phone varchar(50),
    primary key (id)
)
ENGINE=INNODB;

CREATE table employee(
    id integer,
    fname varchar(50),
    lname  varchar(50),
    position varchar(50),
    hiredate date,
    locationID integer,
    primary key (id),
    foreign key (locationID) references restaurant_location(id)
)
ENGINE=INNODB;

CREATE table menu_items(
    id integer,
    item_name varchar(50),
    item_description varchar(200),
    price float,
    attribute varchar(50),
    primary key (id)
)
ENGINE=INNODB;


create table order_menu(
    orderid integer,
    menu_itemID integer,
    primary key (orderid, menu_itemID),
    foreign key (orderid) references orders(id),
    foreign key (menu_itemID) references menu_items(id)
);


create table shift(
    employeeID int,
    locationID int,
    shiftdate date,
    start_time time,
    end_time time,
    foreign key (employeeID) references employee(id),
    foreign key (locationID) references restaurant_location(id)
)
ENGINE=INNODB;

insert into customer values
(1, 'John', 'Smith', 'jsmith@gmail.com', '530-987-4323'),
(2, 'Alex', 'Rogers', 'alroge@gmail.com', '322-987-2345'),
(3, 'Ryan', 'Johnson', 'ryjo@outlook.com', '432-987-4673'),
(4, 'Amy', 'Prizer', 'amyprizer@outlook.com', '634-542-6421'),
(5, 'Courtney', 'Lines', 'courtneyanne@outlook.com', '523-743-3368'),
(6, 'Leslie', 'Montana', 'leslie8765@gmail.com', '432-123-8754'),
(7, 'Jacob', 'Morley', 'jacobmoreboy87@yahoo.com', '432-123-4328'),
(8, 'Blake', 'Butler', 'blakebut6521@yahoo.com', '951-235-6955')
;

insert into orders values
(1, '2023-10-08', 7.12, 3),
(2, '2023-01-04', 12.99, 1),
(3, '2023-02-18', 10.99, 2),
(4, '2023-03-16', 28.75, 5),
(5, '2023-06-29', 11.36, 7),
(6, '2023-05-24', 9.02, 6),
(7, '2022-11-11', 11.16, 4),
(8, '2023-02-18', 19.87, 8)
;

insert into restaurant_location values
(1, 'Sugar & Spice Delights', '12345 Cute Avenue', 'Bloomington', 'IN', 47401, '630-124-9583'),
(2, 'Sugar & Spice Delights East', '67890 Goat Boulevard', 'Bloomington', 'IN', 47403, '812-555‐5556')
;

insert into employee values
(1, 'Johnny', 'Alcaster', 'Cashier', '2021-10-19', 1),
(2, 'Marie', 'Lyons', 'Baker', '2021-03-05', 1),
(3, 'Samantha', 'Samayoa', 'Cashier', '2019-01-02', 2),
(4, 'Cynthia', 'Fuentes', 'Baker', '2020-02-06', 2)
;

insert into menu_items values
(1, 'Strawberry Shortcake', 'A delightful mix of textures and flavors: sweet, tart strawberries paired with light, airy cake or biscuits. Perfect harmony in every bite.', 10.99, 'Gluten Free'),
(2, 'Peach Cobbler', 'Savor the taste of summer with our Peach Cobbler—juicy peaches baked to perfection under a sweet golden biscuit crust, served piping hot.', 7.99, 'Vegan'),
(3, 'Creme Brulee', 'Indulge in elegance with our Crème Brûlée—a silky vanilla-infused custard with a caramelized sugar crust, a timeless French dessert perfected for your delight.', 13.99, 'Vegetarian'),
(4, 'Cheesecake', 'Indulge in creamy perfection with our Cheesecake—cream cheese, sugar, and vanilla blend on a buttery graham cracker crust. Pure decadence in every bite.', 12.99, 'Dairy Free'),
(6, 'Gelato', 'Italian ice cream, richer & creamier due to lower fat & less air. A luxurious frozen treat, offering intense flavors in every spoonful.', 10.99, 'Vegan'),
(7, 'Tiramisu', 'An Italian dessert consisting of layers of coffee-soaked ladyfingers and mascarpone cheese, flavored with cocoa powder. It is chilled and served cold.', 10.99, 'Gluten Free')
;

insert into menu_items(id, item_name, item_description, price) values
(5, 'Brownie', 'A dense, fudgy chocolate dessert, usually square-shaped. It is often served with powdered sugar, icing, or ice cream.', 10.99),
(8, 'Cannoli', 'Fried pastry tubes filled with sweet ricotta, sugar, and chocolate chips. A delectable blend of crunchy and creamy indulgence.', 10.99)
;

insert into order_menu values
(1, 1),
(2, 8),
(3, 2),
(4, 3),
(5, 5),
(6, 6),
(7, 4),
(8, 7)
;



insert into shift values
(1, 1, '2023-10-04', '10:29:39', '3:32:12'),
(2, 1, '2023-09-15', '9:15:39', '12:30:53'),
(3, 2, '2023-09-17', '15:48:43', '17:59:34'),
(4, 2, '2023-06-01', '16:00:12', '18:22:22')
;