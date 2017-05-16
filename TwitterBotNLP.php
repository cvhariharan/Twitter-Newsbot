<?php
//Final script 
ignore_user_abort(true);
require "postagger.php";
use Abraham\TwitterOAuth\TwitterOAuth;
function tag($n)
	{
		$tagger = new PosTagger('lexicon.txt');
        $tags = $tagger->tag($n);
		$flag=0;
		$i=0;
		$pos = Array();
        while($i<count($tags))
		{
			$pos[$i] = $tags[$i]['tag'];
		}
		if($key=array_search("NNP",$pos))
		{
			echo $tags[$key]['token'];
			//return $tags[$key]['token'];
		}
		else if($key = array_search("NN",$pos))
		{
			echo $tags[$key]['token'];
			//return $tags[$key]['token'];
		}
		else
		{
			$key = array_search("NNS",$pos);
			echo $tags[$key]['token'];
			//return $tags[$key]['token'];
		}
	}
$stopwords = array("a","able","about","above","abroad","according","accordingly","across","actually","adj","after","afterwards","again","against","ago","ahead","ain't","all","allow","allows","almost","alone","along","alongside","already","also","although","always","am","amid","amidst","among","amongst","an","and","another","any","anybody","anyhow","anyone","anything","anyway","anyways","anywhere","apart","appear","appreciate","appropriate","are","aren't","around","as","a's","aside","ask","asking","associated","at","available","away","awfully","back","backward","backwards","be","became","because","become","becomes","becoming","been","before","beforehand","begin","behind","being","believe","below","beside","besides","best","better","between","beyond","both","brief","but","by","came","can","cannot","cant","can't","caption","cause","causes","certain","certainly","changes","clearly","c'mon","co","co.","com","come","comes","concerning","consequently","consider","considering","contain","containing","contains","corresponding","could","couldn't","course","c's","currently","dare","daren't","definitely","described","despite","did","didn't","different","directly","do","does","doesn't","doing","done","don't","down","downwards","during","each","edu","eg","eight","eighty","either","else","elsewhere","end","ending","enough","entirely","especially","et","etc","even","ever","evermore","every","everybody","everyone","everything","everywhere","ex","exactly","example","except","fairly","far","farther","few","fewer","fifth","first","five","followed","following","follows","for","forever","former","formerly","forth","forward","found","four","from","further","furthermore","get","gets","getting","given","gives","go","goes","going","gone","got","gotten","greetings","had","hadn't","half","happens","hardly","has","hasn't","have","haven't","having","he","he'd","he'll","hello","help","hence","her","here","hereafter","hereby","herein","here's","hereupon","hers","herself","he's","hi","him","himself","his","hither","hopefully","how","howbeit","however","hundred","i'd","ie","if","ignored","i'll","i'm","immediate","in","inasmuch","inc","inc.","indeed","indicate","indicated","indicates","inner","inside","insofar","instead","into","inward","is","isn't","it","it'd","it'll","its","it's","itself","i've","just","k","keep","keeps","kept","know","known","knows","last","lately","later","latter","latterly","least","less","lest","let","let's","like","liked","likely","likewise","little","look","looking","looks","low","lower","ltd","made","mainly","make","makes","many","may","maybe","mayn't","me","mean","meantime","meanwhile","merely","might","mightn't","mine","minus","miss","more","moreover","most","mostly","mr","mrs","much","must","mustn't","my","myself","name","namely","nd","near","nearly","necessary","need","needn't","needs","neither","never","neverf","neverless","nevertheless","new","next","nine","ninety","no","nobody","non","none","nonetheless","noone","no-one","nor","normally","not","nothing","notwithstanding","novel","now","nowhere","obviously","of","off","often","oh","ok","okay","old","on","once","one","ones","one's","only","onto","opposite","or","other","others","otherwise","ought","oughtn't","our","ours","ourselves","out","outside","over","overall","own","particular","particularly","past","per","perhaps","placed","please","plus","possible","presumably","probably","provided","provides","que","quite","qv","rather","rd","re","really","reasonably","recent","recently","regarding","regardless","regards","relatively","respectively","right","round","said","same","saw","say","saying","says","second","secondly","see","seeing","seem","seemed","seeming","seems","seen","self","selves","sensible","sent","serious","seriously","seven","several","shall","shan't","she","she'd","she'll","she's","should","shouldn't","since","six","so","some","somebody","someday","somehow","someone","something","sometime","sometimes","somewhat","somewhere","soon","sorry","specified","specify","specifying","still","sub","such","sup","sure","take","taken","taking","tell","tends","th","than","thank","thanks","thanx","that","that'll","thats","that's","that've","the","their","theirs","them","themselves","then","thence","there","thereafter","thereby","there'd","therefore","therein","there'll","there're","theres","there's","thereupon","there've","these","they","they'd","they'll","they're","they've","thing","things","think","third","thirty","this","thorough","thoroughly","those","though","three","through","throughout","thru","thus","till","to","together","too","took","toward","towards","tried","tries","truly","try","trying","t's","twice","two","un","under","underneath","undoing","unfortunately","unless","unlike","unlikely","until","unto","up","upon","upwards","us","use","used","useful","uses","using","usually","v","value","various","versus","very","via","viz","vs","want","wants","was","wasn't","way","we","we'd","welcome","well","we'll","went","were","we're","weren't","we've","what","whatever","what'll","what's","what've","when","whence","whenever","where","whereafter","whereas","whereby","wherein","where's","whereupon","wherever","whether","which","whichever","while","whilst","whither","who","who'd","whoever","whole","who'll","whom","whomever","who's","whose","why","will","willing","wish","with","within","without","wonder","won't","would","wouldn't","yes","yet","you","you'd","you'll","your","you're","yours","yourself","yourselves","you've","zero");
$dbhost = "";
$dbuser = "";
$dbpass = "";
$link = mysqli_connect($dbhost,$dbuser,$dbpass) or die("Could not connect to Database");;
mysqli_select_db($link,"");
$select = "SELECT * FROM feeds WHERE 1=1";
$selectre = mysqli_query($link,$select);
while($selectro = mysqli_fetch_array($selectre))
{
$url[$i] = $selectro['Links'];
$cate[$i] = $selectro['Category'];
$i++;
}
$i=0;
$urls = $url;
print_r($urls);
shuffle($urls);
$randomurls = array_slice($urls,3,5);
$k1 = $randomurls[1];
$k2 = $randomurls[2];
$k3 = $randomurls[3];
$k4 = $randomurls[4];
$hash1 = array_search($k1,$url);
$hash2 = array_search($k2,$url);
$hash3 = array_search($k3,$url);
$hash4 = array_search($k4,$url);
$data1 = simplexml_load_file("$k1");
$data2 = simplexml_load_file("$k2");
$data3 = simplexml_load_file("$k3");
$data4 = simplexml_load_file("$k4");
$news1 = $data1->channel->item->title; // Headlines
$news2 = $data2->channel->item->title;
$news3 = $data3->channel->item->title;
$news4 = $data4->channel->item->title;
$link1 = $data1->channel->item->link; // Link to the article
$link2 = $data2->channel->item->link;
$link3 = $data3->channel->item->link;
$link4 = $data4->channel->item->link;
// I could have used a multidimensional array but it is better to understand the code this way
$hashs1 = tag($news1);
$hashs2 = tag($news2);
$hashs3 = tag($news3);
$hashs4 = tag($news4); 
echo "News1: ".$news1." ".$link1." #$hashs1"."<br>";
echo "News2: ".$news2." ".$link2." #$hashs2"."<br>";
echo "News3: ".$news3." ".$link3." #$hashs3"."<br>";
echo "News4: ".$news4." ".$link4." #$hashs4"."<br>";
$consumerKey="";
$consumerSecret = "";
$accessToken = "";
$accessTokenSecret = "";
$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
$connection->setProxy([                                //Its better to use a proxy as twitter may block some api calls
   'CURLOPT_PROXY' => '',
    'CURLOPT_PROXYUSERPWD' => '',
    'CURLOPT_PROXYPORT' => ,
]);
$content = $connection->get("account/verify_credentials");
$connection->setTimeouts(30, 45);
$statuses = $connection->get("statuses/user_timeline", ["count" => 3, "exclude_replies" => true]);
//print_r($statuses);
echo "<br>";
$check = "SELECT * FROM  `tweets`";
$checkresult = mysqli_query($link,$check);
while($lasttweeted = mysqli_fetch_array($checkresult))
{
	$tweeted[$i] = $lasttweeted['Links']; //Already tweeted links
	$tweetednews[$i] = $lasttweeted['News']; //Already tweeted news
	$i++;
}
$j=0;

	if(!in_array(trim($link1),$tweeted) && !in_array(trim($news1),$tweetednews) && !empty($news1))
	{
		/*if(!empty($hash1))
		$tweet1 = $connection->post("statuses/update", ["status" => "$news1 #$cate[$hash1] #$hashs1 $link1"]);
	    else
			$tweet1 = $connection->post("statuses/update", ["status" => "$news1 #$cate[$hash1] $link1"]);*/
        $add = "INSERT INTO tweets (News,Links) VALUES (\"$news1\",\"$link1\")";
        $addresult = mysqli_query($link,$add);
        echo "Tweet 1 sent <br>";
	}
	if(!in_array(trim($link2),$tweeted) && !in_array(trim($news2),$tweetednews) && !empty($news2))
	{
		/*if(!empty($hash2))
		$tweet2 = $connection->post("statuses/update", ["status" => "$news2 #$cate[$hash2] #$hashs2 $link2"]);
	else 
		$tweet2 = $connection->post("statuses/update", ["status" => "$news2 #$cate[$hash2] $link2"]);*/
        $add = "INSERT INTO tweets (News,Links) VALUES (\"$news2\",\"$link2\")";
        $addresult = mysqli_query($link,$add);
		echo "Tweet 2 sent <br>";
	}
	if(!in_array(trim($link3),$tweeted) && !in_array(trim($news3),$tweetednews) && !empty($news3))
	{
	  /* if(!empty($hash3))
	   $tweet3 = $connection->post("statuses/update", ["status" => "$news3 #$cate[$hash3] #$hashs3 $link3"]);
   else
	   $tweet3 = $connection->post("statuses/update", ["status" => "$news3 #$cate[$hash3] #$hash3 $link3"]);*/
       $add = "INSERT INTO tweets (News,Links) VALUES (\"$news3\",\"$link3\")";
       $addresult = mysqli_query($link,$add);
       echo "Tweet 3 sent <br>";	
	}
	if(!in_array($link4,$tweeted) && !in_array($news4,$tweetednews) && !empty($news4))
	{
	  /* if(!empty($hash4))
	   $tweet3 = $connection->post("statuses/update", ["status" => "$news4 #$cate[$hash4] #$hashs4 $link4"]);
   else
	    $tweet3 = $connection->post("statuses/update", ["status" => "$news4 #$cate[$hash4] #$hash4 $link4"]);*/
       $add = "INSERT INTO tweets (News,Links) VALUES (\"$news4\",\"$link4\")";
       $addresult = mysqli_query($link,$add);
       echo "Tweet 4 sent <br>";	
	}
	mysqli_close($link);
	
	
?>