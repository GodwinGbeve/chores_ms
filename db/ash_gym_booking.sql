DROP DATABASE IF EXISTS ash_gym_booking;

CREATE DATABASE IF NOT EXISTS ash_gym_booking_app;

USE ash_gym_booking_app;

-- Table: Users
CREATE TABLE Users (
  userID INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(100) NOT NULL,
  role ENUM('student', 'faculty', 'admin', 'gym instructor') NOT NULL,
  -- Additional fields based on roles
  instructor_qualification VARCHAR(100),
  admin_privileges VARCHAR(100)
);

-- Table: Profiles
CREATE TABLE Profiles (
  profileID INT AUTO_INCREMENT PRIMARY KEY,
  userID INT NOT NULL,
  fitness_goals VARCHAR(255),
  preferred_activities VARCHAR(255),
  height DECIMAL(5,2),
  weight DECIMAL(5,2),
  fitness_level ENUM('beginner', 'intermediate', 'advanced'),
  FOREIGN KEY (userID) REFERENCES Users(userID)
);

-- Table: Bookings
CREATE TABLE Bookings (
  bookingID INT AUTO_INCREMENT PRIMARY KEY,
  userID INT NOT NULL,
  date DATE NOT NULL,
  time_slot TIME NOT NULL,
  activity_type VARCHAR(100),
  location VARCHAR(100),
  status ENUM('confirmed', 'pending', 'canceled') NOT NULL,
  FOREIGN KEY (userID) REFERENCES Users(userID)
);

-- Table: Feedback
CREATE TABLE Feedback (
  feedbackID INT AUTO_INCREMENT PRIMARY KEY,
  userID INT NOT NULL,
  feedback_type ENUM('complaint', 'suggestion', 'praise') NOT NULL,
  message TEXT,
  date DATETIME,
  FOREIGN KEY (userID) REFERENCES Users(userID)
);

-- Table: Equipment
CREATE TABLE Equipment (
  equipmentID INT AUTO_INCREMENT PRIMARY KEY,
  equipment_name VARCHAR(100) NOT NULL,
  equipment_type VARCHAR(100),
  status ENUM('available', 'in use', 'under maintenance') NOT NULL
);

-- Table: Booking_Equipment
CREATE TABLE Booking_Equipment (
  booking_equipmentID INT AUTO_INCREMENT PRIMARY KEY,
  bookingID INT NOT NULL,
  equipmentID INT NOT NULL,
  quantity INT NOT NULL,
  FOREIGN KEY (bookingID) REFERENCES Bookings(bookingID),
  FOREIGN KEY (equipmentID) REFERENCES Equipment(equipmentID)
);

-- Table: Fitness_Tips
CREATE TABLE Fitness_Tips (
  tipID INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  content TEXT,
  category ENUM('workout tips', 'nutrition advice', 'mental health tips')
);

-- Table: User_Fitness_Tips
CREATE TABLE User_Fitness_Tips (
  user_fitness_tipID INT AUTO_INCREMENT PRIMARY KEY,
  userID INT NOT NULL,
  tipID INT NOT NULL,
  likes INT DEFAULT 0,
  comments INT DEFAULT 0,
  FOREIGN KEY (userID) REFERENCES Users(userID),
  FOREIGN KEY (tipID) REFERENCES Fitness_Tips(tipID)
);

-- End of schema definition
