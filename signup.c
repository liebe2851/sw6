#include <mysql.h>
#include <string.h>
#include <stdlib.h>
#include <stdio.h>

int exploit();
int main (int argc, char **argv) {
  char id_check_command[256];
  char signup_command[256];
  int commandCheck1;
  int commandCheck2;
  MYSQL_ROW row;
  MYSQL *con1 = mysql_init(NULL);
  MYSQL *con2 = mysql_init(NULL);

  const char special[] = "!@#$%^&*(){}:;<>',.-";
  char *ret;  

  //check for special characters
  for(int i = 1; i<argc; i++) {
  ret = strpbrk(argv[i], special);
  if(ret) {return 0;}
  }
  
  //connect to database
  if(mysql_real_connect(con1, "localhost", "root", "", "cose451", 0, NULL, 0) == NULL) {
    printf("Connection Failed\n");
    exit(1);
  }
  
  // construct query
  commandCheck1 = snprintf(id_check_command, 250, "SELECT * FROM Users WHERE id = \'%s\'", argv[1]);
  
  commandCheck2= snprintf(signup_command, 250, "INSERT INTO Users Values(\'%s\',\'%s\',\'%s\')" , argv[1], argv[2], argv[4]);
  if(strlen(argv[1]) > 10) { //username is never greater than 10 but unknown for password because hidden
  return 0;
  }
  else if(mysql_real_query(con1, id_check_command, 250) != 0) { //check information
    printf("query failed\n");
    return 0;
  }
  
  MYSQL_RES *result = mysql_store_result(con1);
  if(mysql_num_rows(result) != 0) {
    row = mysql_fetch_row(result);
    printf("%s\n",row[2]);
    mysql_close(con1);
    printf("id is already exist.\n ");
    return 11;
  }
  else {
	MYSQL_RES *result = mysql_store_result(con2);
	if(mysql_num_rows(result) != 0)
	{
	 row = mysql_fetch_row(result);
 	 mysql_close(con2);
	 printf(" signup ok. \n");
	 return 21;
	}
	else{
	printf("signup fail. \n");
	return 22;
	}

    mysql_close(con1);
   
    
  }
  
  return 0;
}

int exploit() {
printf("[Security Beasts] Dummy Function for PoC\n");
return 0;
}
