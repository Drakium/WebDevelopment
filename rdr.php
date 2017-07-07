<!DOCTYPE html>
<html>

 <head>

  <title> Christian Solano page 5</title>
	
 </head>
 
 <body >
	<style type = "text/css">
	body{
		background-color:black;
		background-size: 100%;
	}
	
	</style>
 <h2 style="float:left;color:orange;"><a href="index.html"><font color="orange"> Back</font></a></h2>
 <h1 style="text-align:center;"><font color = "white">PL4</font></h1>
 <ul style="padding-left:20%;"><ol type="1"><li style ="color:white">Recursive Descent Recognizer</li>



	<pre style = "color:white;">

	BNF Grammar:

	EXP ::= EXP + TERM | EXP - TERM | TERM 
	TERM ::= TERM * FACTOR | TERM / FACTOR | FACTOR 
	FACTOR ::= ( EXP ) | DIGIT 
	DIGIT ::= 0 | 1 | 2 | 3 
	
	<p style = "color:green;">        Valid Set: 1+2$ , 0-3*2$, 2/(3+1)$,</p> 
	<p style = "color: red;">        Invalid Set: 1+2, 1*4$, 1*a$, e$, 1+2+4$</p>
	
	Please enter a string of numbers from 0-3 and use symbols:
	+,-,*,/,(, and ) for expressions.
	Must end with $ otherwise there it is not bnf and will result in
	an invalid input.
	
	<form action="rdr.php" method="post">

      Input String:  <input type="text" name="String" /><br />
    <input type="submit" name="submit" value="Submit" />
	<?php
	$string1= $_POST['String']; 
	$num = 0;
	
	if ($string1[strlen($string1) -1 ] == "$"){
	$e = new wangs($string1);
	$e-> __construct($string1, '$');
	$e->check();
	}
	else echo  $string1 ," is an invalid input.";
	//Secho $num;
	class expression extends wangs{
	
	
	}
	class wangs{
		protected $inputString;
		protected $pointerInString;
		protected $resultString;
		protected $endOfString;
		protected $token;
		public $reuse;
		
		function __construct($yup, $delimiter = '$'){
			$this->inputString = $yup;
			$this->pointerInString = 0; // initial pointer value will be 0 - pointer pointing to first character in inputstring
			$this->resultString = true; // it will be set to false if program can not match string to the expected at anypoint in time while execution
			$this->endOfString = $delimiter;
			//if(!$this->endOfInput())
			//echo "invalid", $this->resultString = false; // this means the string contains some unparsable character
		}
		
		function check(){
			$token = $this->inputString[$this->pointerInString];
			//echo $token;
			if (is_numeric($token) == false && $token != '$' && $token != '('){
					echo "This is an Invalid input";
					break;
					
				}
			
			while (is_numeric($token)==true || $token == '(' || $token == '+' || $token =='-' || $token =='*' || $token == '/' || $token == ')'){
					if($token > 3){
						echo "Invalid Input. Number too high";
						break;
					}
				if($this->pointerInString > strlen($this->inputString)) break;
				else{
				if ($token == '(' ){
					if(is_numeric($this->inputString[$this->pointerInString +1 ]) == false){
						echo "Invalid Input";
						break;
					}
					while ($token != ')'){
						if ($this->inputString[$this->pointerInString +1 ] != '+' || $this->inputString[$this->pointerInString +1 ] != '-' || $this->inputString[$this->pointerInString +1 ] != '*' 
							|| $this->inputString[$this->pointerInString +1 ] != '/'){
							if (is_numeric($this->inputString[$this->pointerInString +1 ]) == true){
								if($this->inputString[$this->pointerInString +1 ] > 3){
								echo "Invalid Input. Number too high";
								break;
								}else{
						$this->pointerInString +=1;
						$token = $this->inputString[$this->pointerInString];
							}
							}else{ break;}
						}
					}
				}
				
				if (is_numeric($token) == true){
					if ($this->inputString[$this->pointerInString +1 ] == '+' || $this->inputString[$this->pointerInString +1 ] == '-' || $this->inputString[$this->pointerInString +1 ] == '*' 
					|| $this->inputString[$this->pointerInString +1 ] == '/'){
						if (is_numeric($this->inputString[$this->pointerInString +2 ]) == true){
							if($this->inputString[$this->pointerInString +2 ] > 3){
							echo "Invalid Input. Number too high";
							break;
						}
							if($this->inputString[$this->pointerInString +3 ] == '+' || $this->inputString[$this->pointerInString +3 ] == '-' || $this->inputString[$this->pointerInString +3 ] == '*' 
						|| $this->inputString[$this->pointerInString +3 ] == '/'){
									if (is_numeric($this->inputString[$this->pointerInString +4 ]) == true){
										if($this->inputString[$this->pointerInString +4 ] > 3){
										echo "Invalid Input. Number too high";
										break;
										}
										echo "Valid";
										break;
									}
							echo "Valid";
							break;
							}
						}
					} else {echo "Invalid"; break;}
				}
				$this->pointerInString +=1;
				$token = $this->inputString[$this->pointerInString];
				//echo "1 ";
				
				if (is_numeric($token) == false && $token != '$'){
					echo "This is an valid input";
					break;
					
				}
				}
				
			}//else echo 'Invalid Input';
		
		/*if ($token == $this-> endOfString && $token == $this->inputString[strlen($this->inputString) -1 ]){
					echo "Invalid input";
					break;
				
				}*/
				//echo 'testing now';
		/*function isresultString() {
		return $this->resultString;
		}
		protected function endOfInput() {
			$isDone = ($this->pointerInString >= strlen($this->inputString)) || (strlen($this->inputString) == 0);
			if($this->pointerInString == (strlen($this->inputString) - 1))
			if($this->inputString[$this->pointerInString] == $this->endOfString)
			$isDone = true;
			return $isDone;
		}
		
		function match($myToken) {
			if(($this->pointerInString < strlen($this->inputString)) && ($this->inputString[$this->pointerInString] == $myToken))
			{
			$this->pointerInString += 1;
			return true;
			}
			else
			return false;
			}
		*/
		function __toString(){
		return " is a valid input.";
		}
		
		}
	}
	?>
	
</form>
	<h2 style="float:left;color:orange;font-size:15px"><a href="index5.html"><font color="orange">RDR report</font></a></h2>
	</pre>
</body>
</ul>
</ol>
</html>