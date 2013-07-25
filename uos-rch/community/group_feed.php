<?php
$html = "";
$url = "https://facebook-rss.herokuapp.com/rss/473379929370894";
//$html = file_get_contents($url);
$html = getFeed($url);
//echo substr($html, strpos($html,'<entry>'),strpos($html,'</entry>'));

//echo $html;


function getFeed($feed_url) {
    //pull the feed contents
    $content = file_get_contents($feed_url);
	//$content = str_replace('<entry>','<br/> <hr> <hr>',$content);
	//$content = str_replace('</entry>','<br/> <hr> <hr>',$content);
    //put the feed into a php readable format
    $x = new SimpleXmlElement($content);
	
	
    
    //discern between atom and rss feeds
    if($x->entry){ //atom
  		//echo 'Entry found!';
		
		foreach($x->entry as $entry) {
			echo '<div style="border-width: 1px; border-style: dashed; border-color:green; width:600px; " >';
			if ($entry->content)
				{
				if (strstr($entry->content,'<hr />'))
				{
					$content_temp = str_replace('<hr />','<div style="border-width: 1px; border-style: dashed; border-color:grey; width:400px; " >',$entry->content);
					/*if (strstr($content_temp,'http://'))
						$content_temp = str_replace('http://','<embed src=http://',$entry->content);*/
					echo $content_temp .'</div>';
					
				}
				else
					echo $entry->content .'</div>';
				
				echo '<div style="padding-left:500px"><a href="'. $entry->link->attributes()->href .  '" > Coment or Like </a> </div>';
				}
			//if ($entry->author)
				//echo 'By: '. $entry->author->name;
			echo '<br/> ';
			echo '</div>';
			echo '<br/>';
		}
	}
  
  /*      $ret->title=$x->title.'';
        $ret->description=$x->subtitle.'';
        $ret->copyright=$x->rights.'';
        $ret->logo=$x->logo.'';
        $ret->link=$x->link[1]->attributes()->href.'';
        //insert the entries for the feed into the returnable object
        $c=0;
        foreach($x->entry as $entry) {
            $ret->items[$c]->title=$entry->title.'';
            $ret->items[$c]->link=$entry->link.'';
            $ret->items[$c]->author=$entry->author->name.'';
            $ret->items[$c]->published=$entry->published.'';
            $ret->items[$c]->contents=$entry->content.'';
            $c++;
        }
    }
    else{ //rss
    
        //determining feed values depending on what exists
        if($x->title) $ret->title=$x->title.'';
        else $ret->title=$x->channel->title.'';
        if($x->description) $ret->description=$x->description.'';
        else $ret->description=$x->channel->description.'';
        if($x->copyright) $ret->copyright=$x->copyright.'';
        else $ret->copyright=$x->channel->copyright.'';
        if($x->image->url) $ret->logo=$x->image->url.'';
        else $ret->logo=$x->channel->image->url.'';
        if($x->link) $ret->link=$x->link.'';
        else $ret->link=$x->channel->link.'';
        
        //insert the entries for the feed into the returnable object
        $c=0;
        foreach($x->channel->item as $entry) {
            $ret->items[$c]->title=$entry->title.'';
            $ret->items[$c]->link=$entry->link.'';
            $ret->items[$c]->author=$entry->author.'';
            $ret->items[$c]->published=strtotime($entry->pubDate);
            $ret->items[$c]->contents=$entry->description.'';
            $c++;
        }
    }*/
    
    return $content;
}
?>