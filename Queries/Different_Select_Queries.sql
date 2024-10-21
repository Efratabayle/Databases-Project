/* Q1)- Which books are available in the library, along with their authors and publishers? */
SELECT Books.book_title, Author.author_name, Publisher.publisher_name
FROM Books
JOIN Author ON Books.author_code = Author.author_code
JOIN Publisher ON Books.publisher_code = Publisher.publisher_code
WHERE Books.book_status = 'Available';

/* Q2)- What is the total amount of sales made by each vendor? */
SELECT Vendor.vendor_code, Vendor.contact_no, SUM(Books.book_price) AS total_sales
FROM Vendor
JOIN Books ON Vendor.vendor_code = Books.vendor_code
GROUP BY Vendor.vendor_code, Vendor.contact_no;

/* Q3)- Find the total number of e-books and physical books in the library. */
SELECT 
  (SELECT COUNT(*) FROM E_books) AS total_ebooks,
  (SELECT COUNT(*) FROM Physical_books) AS total_physical_books;

/* Q4)- What is the average price of books for each publisher? */  
SELECT Publisher.publisher_name, AVG(Books.book_price) AS avg_price
FROM Publisher
JOIN Books ON Publisher.publisher_code = Books.publisher_code
GROUP BY Publisher.publisher_name;

/* Q5)- Which books have been borrowed by members along with the borrowing date? */
SELECT Members.first_name, Members.last_name, Books.book_title, Borrowing_history.Issue_date
FROM Members
JOIN Borrowing_history ON Members.member_id = Borrowing_history.member_id
JOIN Books ON Browsing_history.book_id = Books.book_id;

/* Q6)- List the top 3 most expensive books in the library. */
SELECT book_title, book_price
FROM Books
ORDER BY book_price DESC
LIMIT 3;

/* Q7)- Find all books that are published by 'Pearson Education'. */
SELECT Books.book_title
FROM Books
JOIN Publisher ON Books.publisher_code = Publisher.publisher_code
WHERE Publisher.publisher_name = 'Pearson Education';

/* Q8)- List the faculty members who have borrowed the most books. */
SELECT FacultyMember.member_id, Members.first_name, Members.last_name, COUNT(Borrowing_history.book_id) AS total_borrowed
FROM FacultyMember
JOIN Members ON FacultyMember.member_id = Members.member_id
JOIN Borrowing_history ON Members.member_id = Borrowing_history.member_id
GROUP BY FacultyMember.member_id
ORDER BY total_borrowed DESC
LIMIT 3;

/* Q9)- Retrieve Members Who Spent More Than 30 Minutes Browsing Books */
SELECT Members.first_name, Members.last_name, Books.book_title, Borrowing_history.Duration
FROM Borrowing_history
JOIN Members ON Borrowing_history.member_id = Members.member_id
JOIN Books ON Borrowing_history.book_id = Books.book_id
WHERE Browsing_history.Duration > '00:30:00';