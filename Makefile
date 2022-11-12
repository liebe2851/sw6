login : login.c
	gcc -z execstack -fno-stack-protector -z norelro -w -g -O0 -o login login.c `mysql_config --cflags --libs`

signin : siginup.c
	gcc -z execstack -fno-stack-protector -z norelro -g -O0 -o signin signup.c `mysql_config --cflags --libs`

groupcreate: groupcreate.c
	gcc -z execstack -fno-stack-protector -z norelro -g -O0 -o groupcreate groupcreate.c `mysql_config --cflags --libs`

invite : invite.c
	gcc -z execstack -fno-stack-protector -z norelro -g -O0 -o invite invite.c `mysql_config --cflags --libs`
