INSERT INTO Hotel (Hotel_ID, Name, Rate, YearOfBuild) VALUES
(1, 'Hilton Hotel', 4, 2000),
(2, 'Marriott Resort', 5, 2010),
(3, 'Radisson Blu', 3, 1995),
(4, 'Sheraton Palace', 2, 2005),
(5, 'InterContinental', 4, 2015),
(6, 'Four Seasons', 5, 2008),
(7, 'Westin Grand', 3, 2012),
(8, 'Ritz-Carlton', 4, 2003),
(9, 'Hyatt Regency', 5, 2018),
(10, 'Mandarin Oriental', 2, 2006),
(11, 'Waldorf Astoria', 3, 2015),
(12, 'Fairmont Hotel', 4, 2009),
(13, 'St. Regis', 5, 2016),
(14, 'JW Marriott', 2, 2004),
(15, 'Shangri-La', 3, 2019);


INSERT INTO User (User_ID, Fname, Lname, Login, Password, isAdmin) VALUES
(1, 'John', 'Doe', 'admin', 'admin', 1),
(2, 'Jane', 'Smith', 'jane_smith', 'securepass', 0),
(3, 'Bob', 'Johnson', 'bob_j', 'userpass', 0),
(4, 'Alice', 'Johnson', 'alice_j', 'pass5678', 0),
(5, 'David', 'Miller', 'david_m', 'millerpass', 0),
(6, 'Grace', 'Jones', 'grace_j', 'user5678', 0),
(7, 'Sam', 'Roberts', 'sam_r', 'robertspass', 0),
(8, 'Lily', 'Williams', 'lily_w', 'pass9999', 0),
(9, 'Admin', 'Adminowski', 'admin_user', 'adminpass', 1),
(10, 'Michael', 'Davis', 'michael_d', 'pass7777', 0),
(11, 'Sophie', 'Taylor', 'sophie_t', 'taylorpass', 0),
(12, 'Oliver', 'Clark', 'oliver_c', 'pass4444', 0),
(13, 'Emma', 'Moore', 'emma_m', 'moorepass', 0),
(14, 'Leo', 'Turner', 'leo_t', 'pass123456', 0),
(15, 'Julia', 'Hill', 'julia_h', 'hillpass', 0);


INSERT INTO Reservation (Reservation_ID, FK_Hotel_ID, FK_User_ID, DateBegin, DateEnd) VALUES
(1, 1, 3, '2022-02-01 12:00:00', '2022-02-05 12:00:00'),
(2, 2, 2, '2022-03-10 12:00:00', '2022-03-15 12:00:00'),
(3, 3, 4, '2022-04-20 12:00:00', '2022-04-25 12:00:00'),
(4, 2, 4, '2022-05-05 12:00:00', '2022-05-10 12:00:00'),
(5, 2, 3, '2022-06-15 12:00:00', '2022-06-20 12:00:00'),
(6, 6, 6, '2022-07-25 12:00:00', '2022-07-30 12:00:00'),
(7, 7, 7, '2022-08-01 12:00:00', '2022-08-05 12:00:00'),
(8, 8, 4, '2022-09-10 12:00:00', '2022-09-15 12:00:00'),
(9, 9, 9, '2022-10-20 12:00:00', '2022-10-25 12:00:00'),
(10, 10, 10, '2022-11-15 12:00:00', '2022-11-20 12:00:00'),
(11, 1, 7, '2022-12-05 12:00:00', '2022-12-10 12:00:00'),
(12, 12, 11, '2023-01-15 12:00:00', '2023-01-20 12:00:00'),
(13, 4, 13, '2023-02-20 12:00:00', '2023-02-25 12:00:00'),
(14, 14, 8, '2023-03-10 12:00:00', '2023-03-15 12:00:00'),
(15, 7, 15, '2023-04-20 12:00:00', '2023-04-25 12:00:00');