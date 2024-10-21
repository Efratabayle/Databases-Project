CREATE TABLE Admin (
    Admin_id INT PRIMARY KEY,
    Admin_name VARCHAR(255),
    Contact_no VARCHAR(15)
);
 
CREATE TABLE Author (
    Author_code INT PRIMARY KEY,
    Author_name VARCHAR(255),
    Author_subject VARCHAR(255)
);
 
CREATE TABLE Vendor (
    Vendor_code INT PRIMARY KEY,
    Contact_no VARCHAR(15)
);

CREATE TABLE Publisher (
    Publisher_code INT PRIMARY KEY,
    Publisher_name VARCHAR(255),
    Publisher_country VARCHAR(100)
);
 
 CREATE TABLE Library (
    Library_code INT PRIMARY KEY,
    Library_name VARCHAR(255),
    Library_address VARCHAR(255),
    Contact_no VARCHAR(15),
    Admin_id INT UNIQUE,
    FOREIGN KEY (Admin_id) REFERENCES Admin(Admin_id)
);

CREATE TABLE Members (
    Member_id INT PRIMARY KEY,
    First_name VARCHAR(255),
    Last_name VARCHAR(255),
    Address VARCHAR(255),
    State VARCHAR(100),
    City VARCHAR(100),
    Pin_code VARCHAR(10),
    Contact_no VARCHAR(15)
);

CREATE TABLE Employees (
    Employee_id INT PRIMARY KEY,
    Employee_name VARCHAR(255),
    Designation VARCHAR(100),
    Mobile_no VARCHAR(15),
    Admin_id INT,
    FOREIGN KEY (Admin_id) REFERENCES Admin(Admin_id)
);

CREATE TABLE Librarian (
    Employee_id INT PRIMARY KEY,
    Contract_id INT,
    FOREIGN KEY (Employee_id) REFERENCES Employees(Employee_id)
);

CREATE TABLE StudentAssistant (
    Employee_id INT PRIMARY KEY,
    Hourly_wage DECIMAL(10, 2),
    FOREIGN KEY (Employee_id) REFERENCES Employees(Employee_id)
);

CREATE TABLE Books (
    Book_id INT PRIMARY KEY,
    Book_title VARCHAR(255),
    Book_price DECIMAL(10, 2),
    Book_status VARCHAR(50),
    Publisher_code INT,
    Author_code INT,
    Vendor_code INT,
    Library_code INT,
    Employee_id INT,
    FOREIGN KEY (Publisher_code) REFERENCES Publisher(Publisher_code),
    FOREIGN KEY (Author_code) REFERENCES Author(Author_code),
    FOREIGN KEY (Vendor_code) REFERENCES Vendor(Vendor_code),
    FOREIGN KEY (Library_code) REFERENCES Library(Library_code),
    FOREIGN KEY (Employee_id) REFERENCES Employees(Employee_id)
);

CREATE TABLE E_books (
    Book_id INT PRIMARY KEY,
    File_format VARCHAR(50),
    File_size DECIMAL(10, 2),
    FOREIGN KEY (Book_id) REFERENCES Books(Book_id)
);

CREATE TABLE Physical_books (
    Book_id INT PRIMARY KEY,
    Copies_available INT,
    Condition_of_book VARCHAR(50),
    FOREIGN KEY (Book_id) REFERENCES Books(Book_id)
);

CREATE TABLE Borrowing_history (
    History_id INT PRIMARY KEY,
    Member_id INT,
    Book_id INT,
    Issue_date DATE,
    Return_date DATE,
    Duration TIME, 
    FOREIGN KEY (Member_id) REFERENCES Members(Member_id),
    FOREIGN KEY (Book_id) REFERENCES Books(Book_id)
);

CREATE TABLE StudentMember (
    Member_id INT PRIMARY KEY,
    Matriculation VARCHAR(50),
    FOREIGN KEY (Member_id) REFERENCES Members(Member_id)
);

CREATE TABLE FacultyMember (
    Member_id INT PRIMARY KEY,
    Department VARCHAR(100),
    FOREIGN KEY (Member_id) REFERENCES Members(Member_id)
);

CREATE TABLE Employee_Member (
    Employee_id INT,
    Member_id INT,
    PRIMARY KEY (Employee_id, Member_id),
    FOREIGN KEY (Employee_id) REFERENCES Employees(Employee_id),
    FOREIGN KEY (Member_id) REFERENCES Members(Member_id)
);


 
 