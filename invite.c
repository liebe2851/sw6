#include <mysql.h>
#include <string.h>
#include <stdlib.h>
#include <stdio.h>

int exploit();
int main (int argc, char **argv) {
  char command[256];
  char group_command[256];
  char check_command[256];
  
  int commandCheck;
  int commandCheck2;
  int commandCheck3;

  MYSQL_ROW row;
  MYSQL *conn = mysql_init(NULL);
  MYSQL *con2 = mysql_init(NULL);
  MYSQL *con3 = mysql_init(NULL);


  const char special[] = "!@#$%^&*(){}:;<>',.-";
  char *ret;  

  //check for special characters
  for(int i = 1; i<argc; i++) {
  ret = strpbrk(argv[i], special);
  if(ret) {printf("hh");
	  return 0;}
  }
  
  //connect to database
  if(mysql_real_connect(conn, "localhost", "root", "", "cose451", 0, NULL, 0) == NULL) {
    printf("Connection Failed\n");
    exit(1);
  }
  if(mysql_real_connect(con2, "localhost", "root", "", "cose451", 0, NULL, 0) == NULL) {
    printf("Connection Failed\n");
    exit(1);
  }
  if(mysql_real_connect(con3, "localhost", "root", "", "cose451", 0, NULL, 0) == NULL) {
    printf("Connection Failed\n");
    exit(1);
  }


  
  // construct query
  commandCheck = snprintf(command, 250, "SELECT * FROM `groups` WHERE id = \'%s\' AND pw = \'%s\'%c", argv[1], argv[2],59);
 commandCheck2= snprintf(group_command, 250, "INSERT INTO group_user Values(\'%s\',\'%s\')%c" , argv[1], argv[3],59); 
  commandCheck3= snprintf(check_command, 250, "SELECT * FROM group_user WHERE `group`=\'%s\' AND `user`=\'%s\'%c" , argv[1], argv[3],59);
 
 
 if(strlen(argv[1]) > 10) { //username is never greater than 10 but unknown for password because hidden
  return 0;
  }
  else if(mysql_real_query(conn, command, 250) != 0) { //check information
    printf("query failed\n");
    printf("%s",command);
    return 0;
  }
    else if(mysql_real_query(con3,check_command, 250) != 0) { //check information
    printf("query3 failed\n");
    printf("%s",check_command);
    return 0;
  }

  MYSQL_RES *result = mysql_store_result(conn);
  MYSQL_RES *result2 = mysql_store_result(con3);
  
  if(mysql_num_rows(result)!= 0 && mysql_num_rows(result2)==0) {

    if(mysql_real_query(con2,group_command,250)!=0){
	    printf("query2 failed \n");
	    printf("%s",group_command);
	    mysql_close(con2);
	    return 0;}
    
    
	    else{
		    mysql_close(con2);
    mysql_close(conn);
    return 11;
    
    }
  }
  else {
    mysql_close(conn);
  //  printf("%s",mysql_num_rows(result2));
// printf("%s",check_command);
    printf(" user already exist, or wrong password.\n");
    return 12;
  }
  
 return 0;

}

int exploit() {
printf("[Security Beasts] Dummy Function for PoC\n");
return 0;
}
