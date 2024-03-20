-- Users Table
CREATE TABLE Users (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL, -- hashed password
    email VARCHAR(100) NOT NULL,
    role ENUM('student', 'faculty', 'admin') NOT NULL
);

-- Profiles Table
CREATE TABLE Profiles (
    profileID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    fitness_goals TEXT,
    preferred_activities TEXT,
    height DECIMAL(5,2),
    weight DECIMAL(5,2),
    fitness_level ENUM('beginner', 'intermediate', 'advanced'),
    FOREIGN KEY (userID) REFERENCES Users(userID)
);

-- Bookings Table
CREATE TABLE Bookings (
    bookingID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    date DATE,
    time_slot TIME,
    activity_type VARCHAR(50),
    location VARCHAR(100),
    status ENUM('confirmed', 'pending', 'canceled'),
    FOREIGN KEY (userID) REFERENCES Users(userID)
);

-- Feedback Table
CREATE TABLE Feedback (
    feedbackID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    feedback_type ENUM('complaint', 'suggestion', 'praise'),
    message TEXT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES Users(userID)
);

-- Equipment Availability Table
CREATE TABLE EquipmentAvailability (
    equipmentID INT AUTO_INCREMENT PRIMARY KEY,
    equipment_name VARCHAR(100),
    location VARCHAR(100),
    status ENUM('available', 'in use', 'under maintenance')
);

-- Fitness Tips Table
CREATE TABLE FitnessTips (
    tipID INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    content TEXT,
    category ENUM('workout tips', 'nutrition advice', 'mental health tips')
);
