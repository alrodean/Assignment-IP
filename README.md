CAMPUS MANAGEMENT SYSTEM

OVERVIEW

This is a console based management system developed in PHP
The system has 3 main modules:

    Parking Permit Management
    Library Borrowing and Fines
    Student Performance Tracking

The application runs in the terminal using a menu driven interface.

REQUIREMENTS:
    PHP 7 or higher
    Command-Line / Terminal Access

How to Run:
    1. Open Terminal
    2. Navigate to the project folder
    3. Run: index.php

PROJECT STRUCTURE
index.php -> Main Menu and Navigation
functions.php -> Shared helper functions (menus, pause, validation)
parking.php -> Parking Permit Module
library.php -> Library System (users, borrowing, Fines)
performance.php -> Student performance tracking

PARKING MODULE
Features :
    Adding parking permits (Students/Staff/Visitors)
    Age restriction (18+ only)
    Permit limit (capacity control)
    View Issued Permits
    Summary:
        Number of each permit type
        Total revenue generated


LIBRARY MODULE
Features:
    Add users (validated User ID format e.g. U001)
    Borrow Books:
        Select Category(Textbook, Journal, Reference)
        Set borrowing duration (1 - 30 days)
    Return Books:
        Calculates late fines automatically
    Pay fines:
        Partial or Full payment supported
    User Summary
        Displays all users
        Shows borrowed books and outstanding fines

PERFORMANCE MODULE
Features
    Add Students(validated Student ID e.g. S001)
    Capture 6 subject marks (0 - 100)
    Calculate:
        Average
        Result(Fail, Pass, Distinction)
    Summary:
        Top Performer
        Highest and Lowest Average
        Class Average

KEY CONCEPTS USED
    Arrays(indexed and associative)
    Loops(while, for, foreach)
    Conditional logic(if, switch)
    Input validation
    Modular programming using seperate files
    Global variables for shared data

NOTES
    This system data in memory (arrays), so data resets when the program stops
    Designed for educational purposes and assignment requirements

AUTHOR
    Deen Fransman
    Developed as part of PHP (Internet Programming) Assignment

