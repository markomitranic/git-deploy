# Git Deployment PHP

This is a very simple PHP script that allows you to dogit deployment without any hooks, and 
with simple sha256 password protection.

## All Credit
All credit goes to @oodavid https://github.com/oodavid
This was created based on his script that can be found on https://gist.github.com/oodavid/1809044
I have added the simplest possible no-db password protection algorythm. Thus making the script manual in nature.

## How it works:

### Password
Change the hash in the php constant HASH with the new hash you want. You can calculate the new HASH by using an external service like: http://www.xorbin.com/tools/sha256-hash-calculator or you can echo the $hash manually in order to find out what it transforms to.

### Setting things up
Upload the file (or commit it to your git repo) anywhere. I like using a sub directory like wp-admin, but it can also function within root. Keep in mind that some directories might have weird permissions, i can only guarantee that root works fine. :)

### Usage
So, now we have a repo locally, and we also have a repo on the server. We can make some changes on local and commit them and push them. The only thing we need to do is visit the remote server's deploy.php, enter the password and that is it...

Of course, we can modify the script in order to make an automatic GitHub hook, but that means removing password protection... You can read more about it in the sources.

## Future
It would be nice to implement at least some minimal level of PHP command injection protection, since the script has none...