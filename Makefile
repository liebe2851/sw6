test:
	gcc -z execstack -fno-stack-protector -z norelro -w -g -O0 -o login login.c `mysql_config --cflags --libs`
	gcc -z execstack -fno-stack-protector -z norelro -g -O0 -o signin signup.c `mysql_config --cflags --libs`
	gcc -z execstack -fno-stack-protector -z norelro -g -O0 -o groupcreate groupcreate.c `mysql_config --cflags --libs`
	gcc -z execstack -fno-stack-protector -z norelro -g -O0 -o invite invite.c `mysql_config --cflags --libs`

clean:
	rm login signin groupcreate invite

