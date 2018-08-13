1. SELECT Clause
    Ex.:
         SELECT * FROM `table_name`; <!-- <== This will show all columns of the table -->
2. INSERT Clause
    Ex.:
        INSERT INTO `table_name` (`table_column1`,`table_column2`,'table_column3') VALUES ('table1value','table2value','table3value');
3. UPDATE Clause
    Ex.:
        UPDATE `table_name` SET `column_name`='value' WHERE `column_name`='whatWillBeTheBasisToChangeTheData';
4. DELETE Clause
    Ex.:
        DELETE `table` WHERE `columname`="";
5. SELECT * FROM `tbl_item`,`tbl_type` WHERE `tbl_item.item` = `tbl_type.type_id`;



<!-- ====================================================================== -->
SELECT  * FROM `tbl_employee_record` WHERE `employee_name`LIKE '%v%' 

        ===> this will view all employee name who have letter "v" in employee_name

    


