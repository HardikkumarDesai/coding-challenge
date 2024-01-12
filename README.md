Given an uploaded csv file
```
1,2,3
4,5,6
7,8,9
```

1. Echo (given)
    - Return the matrix as a string in matrix format.
    
    ```
    // Expected output
    1,2,3
    4,5,6
    7,8,9
    ``` 
2. Invert
    - Return the matrix as a string in matrix format where the columns and rows are inverted
    ```
    // Expected output
    1,4,7
    2,5,8
    3,6,9
    ``` 
3. Flatten
    - Return the matrix as a 1 line string, with values separated by commas.
    ```
    // Expected output
    1,2,3,4,5,6,7,8,9
    ``` 
4. Sum
    - Return the sum of the integers in the matrix
    ```
    // Expected output
    45
    ``` 
5. Multiply
    - Return the product of the integers in the matrix
    ```
    // Expected output
    362880
    ``` 

The input file to these functions is a matrix, of any dimension where the number of rows are equal to the number of columns (square). Each value is an integer, and there is no header row. matrix.csv is example valid input.  

Send request
```
curl -F 'file=@/path/matrix.csv' "localhost:8080/echo"
```



Project setup instructions :

1. Clone project in htdocs or www folder.

2. Navigate to cloned `coding-challenge` repo in terminal.

3. Run `composer install` command in terminal.

4. Use below listed commands in terminal to perform actions :

     a. curl -F 'file=@matrix.csv' "http://localhost:8888/league-coding-challenge/echo"
     b. curl -F 'file=@matrix.csv' "http://localhost:8888/league-coding-challenge/invert"
     c. curl -F 'file=@matrix.csv' "http://localhost:8888/league-coding-challenge/flatten"
     d. curl -F 'file=@matrix.csv' "http://localhost:8888/league-coding-challenge/sum"
     e. curl -F 'file=@matrix.csv' "http://localhost:8888/league-coding-challenge/multiply"
 
5. Run ./vendor/bin/phpunit command to execute all unit test
