Student Database Web Project 
Project Description  This project is a simple web application that allows users to enter their name and age, store the information in a MySQL database, and display the saved records in a table. 
The application also includes a Toggle button that allows the user to change the status of each record between 0 and 1 without refreshing the webpage.
## Technologies Used
- HTML
- CSS
- JavaScript
- PHP
- MySQL
## Project Features
### 1. Data Entry Form
The webpage contains a form with:
- Name field
- Age field
- Submit button
### 2. Store Data
When the user submits the form, the name and age are stored in the MySQL database.
### 3. Display Records
All records stored in the database are displayed in a table containing:
- ID
- Name
- Age
- Status
- Action
### 4. Toggle Status
Each record has a Toggle button.

When the button is clicked, the status changes:
0 → 1 or 1 → 0
### 5. Instant Update
The status is updated in the database and displayed immediately on the webpage without refreshing the page.

## Database
The project uses a MySQL database with a users table.
The table contains the following fields:

| Field | Description |
|------|-------------|
| ID | Unique record ID |
| Name | User name |
| Age | User age |
| Status | Record status (0 or 1) |

## Project Files
- index.php — Main webpage and database records display.
- config.php — Database connection settings.
- toggle.php — Updates the status of a record.
- script.js — Handles the Toggle operation and updates the page.
- style.css — Controls the webpage design and layout.
- database.sql — Contains the SQL commands for creating the database table and sample data.
## How the Project Works
1. The user enters a name and age.
2. The user clicks the Submit button.
3. PHP sends the data to the MySQL database.
4. The saved records are displayed in the table.
5. The user clicks Toggle for a specific record.
6. JavaScript sends a request to PHP.
7. PHP updates the status in the MySQL database.
8. The new status appears immediately on the webpage.
## Testing
The project was tested by:
- Adding new records.
- Displaying the records in the table.
- Changing the status using the Toggle button.
- Confirming that the status changes between 0 and 1.
- Confirming that the status changes without refreshing the webpage.
- Checking the updated values in the MySQL database.
  
[Open the Student Database Website](https://atheer.free.je/?i=2)
