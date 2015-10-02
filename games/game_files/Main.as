package  {
	
	import flash.display.MovieClip;
	import flash.events.MouseEvent;
	import flash.events.KeyboardEvent;

	public class Main extends MovieClip {
	
		public var trivialist:TriviaList;
		public var CurrentWord:String;
		public var CurrentClue:String;
		public var CurrentChoices:String;
		public var rnd:int;
		public var chc:int;
		public var Letters:Array=new Array;
		public var wd:Array = new Array;
		public var WordsChoices:Array=new Array;
		public var i:int;
		public var d:int;
		public var tile:Tile;
		public var tileWords:WdTile;
		
		public var TileArray:Array=new Array;
		public var ChoicesTileArray:Array=new Array;
		public var UserKeyPress:String;
		public var Alphabet:Array=new Array;
		public var Found:Boolean;
		public var Win:Boolean;
		public var Lose:Boolean;
		public var DefeatCounter:int;
		public var UsedCharacters:Array=new Array;
		public var FirstPlayThrough:Boolean= true;
	    public var score:Number;
		public var numberoftries:Number = 3;		
		public var levelcounter:Number;
		public var musiccounter:Number = 0;

		
		public function Main() {
			stop();
			trivialist=new TriviaList;
			
			
		}//main
						
		public function SetUp(){
			DefeatCounter=0;
			//Man.gotoAndStop(1);
			//trace(trivialist.Words);trace(trivialist.Clues);
			ChooseAWord();
			//SplitIntoLetters();
			SplitIntoWords();
			Display();
			AddControls();
			
						
		}//setup
		
		public function ChooseAWord(){
			rnd=Math.random()*trivialist.Words.length;
			
			CurrentWord=trivialist.Words[rnd];
			CurrentClue=trivialist.Clues[rnd];
			CurrentChoices=trivialist.Choices[rnd];
			
			//trace(CurrentWord);
			trace(CurrentClue);
			//trace(CurrentChoices);
		}//chooseaword
		
		
		public function SplitIntoWords(){
			WordsChoices=CurrentChoices.split(",");
			trace(WordsChoices);
		}
		
		
		//public function SplitIntoLetters(){
			//Letters=CurrentWord.split("");
			//trace(Letters);
		//}//splitintoletters
		
		
		public function Display(){
			//MessageBoard.visible=false;
			DisplayClue.text=CurrentClue.toUpperCase();
			//DisplayChoices.text=CurrentChoices.toUpperCase();//embed chars
			//show tiles
			////for(i=0;i<Letters.length;i++){
				//tile=new Tile;addChild(tile);
				
				//tile.x=450;tile.y=480;
				//TileArray[i]=tile;
			
				
				for(d=0;d<5;d= d + 1){
					//f==wd[d];
						
						
				 //ChoicesText.text = Choices;
			//ChoicesTileArray[d].
			//ChoicesText.text = WordsChoices;
					if(d==0){
						
						//addChildAt(yourMC,);
					
				//tileWords=new WdTile;
				buttons.text01.text = String(WordsChoices[d]);
				//addChildAt(tileWords,numChildren-1);
				//tileWords.x=450;tileWords.y=560;
				//ChoicesTileArray[d].ChoicesText.text = WordsChoices;
											
					}
					
					if(d==1){
						
						buttons.text02.text = String(WordsChoices[d]);
					
				//tileWords=new WdTile;
				///tileWords.ChoicesText.text =   String(WordsChoices[d]);
				//addChildAt(tileWords,numChildren-1);
				//tileWords.x=950;tileWords.y=480;
				//ChoicesTileArray[d].ChoicesText.text = WordsChoices;
				
					}if(d==2){
						
					buttons.text03.text = String(WordsChoices[d]);
				///tileWords=new WdTile;
				///tileWords.ChoicesText.text =  String(WordsChoices[d]);
				//addChildAt(tileWords,numChildren-1);
				//tileWords.x=950;tileWords.y=480;
				//ChoicesTileArray[d].ChoicesText.text = WordsChoices;
				
				
					}if(d==3){
						
					buttons.text04.text = String(WordsChoices[d]);
				//tileWords=new WdTile;
				//tileWords.ChoicesText.text =  String(WordsChoices[d]);
				//addChildAt(tileWords,numChildren-1);
				//tileWords.x=950;tileWords.y=560;
				
				//ChoicesTileArray[d].ChoicesText.text = WordsChoices;
				
					}
				
			}//for i
		}//display
		
				public function AddControls(){
			if(FirstPlayThrough){
			FirstPlayThrough=false;
			stage.focus=stage;
			stage.addEventListener(KeyboardEvent.KEY_UP,keyUpListener);
			function keyUpListener(e:KeyboardEvent):void {trace(e.keyCode);
				UserKeyPress=ConvertToLetter(e.keyCode);
				ProcessAnswer(UserKeyPress);
			}//keyuplistener
			}//if
		}//controls
		
		public function ConvertToLetter(a){
			Alphabet=["A","B","C","D"];
			if(a>64 && a<69){
			return(Alphabet[a-65]);
			}//if
			else{return("");}
		}//convert
		
		
		
		public function commitanswer(UserKeyPress):void{
						
//ProcessAnswer(UserKeyPress);

				
				if (CurrentWord == UserKeyPress){
						trace("GOOD TO GO");
						//Found = true;
						
						gotoAndStop(9);
						
				
				
				}
				
				
				if (CurrentWord != UserKeyPress){
						trace("BAD ANSWER");
						gotoAndStop(7);
						
						//Found = true;
						
				
				
				}	
			

		}
		
		
						public function ProcessAnswer(a){
			if(a!="" && !Lose && !Win){
				Found=false;
				
			
			tile.Blank.text = a;
				
					
		
			
						
					
				
				
				/*
				for (i=0;i<Letters.length;i++){
					if(a==Letters[i]){TileArray[i].Blank.text=a;Found=true;}
				}// for
				*/
			if(Found){CheckForWin();}
			if(!Found && Unused(a)){AddBodyPart();
						DisplayWrongLetter(a);
						CheckForDefeat();
						}//if !found
			}//if a!=""...
			else{
			if(Win || Lose){RestartGame();}
			}//else
		}//processanswer
		
		public function CheckForWin(){
			Win=true;
			for (i=0;i<Letters.length;i++){
				if(TileArray[i].Blank.text!=Letters[i]){Win=false;
				}
				
			}
				
				if(Win){
				
			gotoAndStop(9);
			//this.Man.stop();
			
			
				
				}
				
				
				
							
			}//
				
				
				
				
			//for i
			
			
			
			
			//if(Win){MessageBoard.visible=true;
			//MessageBoard.gotoAndStop(1);
			//
			//}//if win
		//Check for win
		
		
		public function Unused(a){
			for (i=0;i<UsedCharacters.length;i++){
				if(UsedCharacters[i]==a){return false;}
			}//for i
			return true;
		}//unused
		
		
		public function AddBodyPart(){
			Man.nextFrame();
		}//addbodypart
		
		
		public function CheckForDefeat(){
			DefeatCounter++;
			if(DefeatCounter==5){Lose=true;
			//MessageBoard.visible=true;
			//MessageBoard.gotoAndStop(2);
			this.gotoAndStop(7);
			
			numberoftries = numberoftries -1;
			
			
			
			}
		}//check for defeat
		
		
		public function DisplayWrongLetter(a){
			UsedCharacters[UsedCharacters.length]=a;
			//BadLetters.text="";
			for(i=0;i<UsedCharacters.length;i++){
				//BadLetters.appendText(UsedCharacters[i]+" ");
			}//fori
		}//displaywrongletter
		
		
		public function RestartGame(){
			Win=false;Lose=false;//BadLetters.text="";
			for(i=0;i<Letters.length;i++){
				removeChild(TileArray[i]);TileArray[i]=null;
			}//for i
			Letters=[];UsedCharacters=[];TileArray=[];
			SetUp();
		}//restartgame
		
		
		
}}