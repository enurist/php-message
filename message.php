<?php
    $file='notification/news.txt' ;
    $news='' ;
    if (file_exists($file)) {
        if (!isset($_POST[ 'input'])) {
            $news=file_get_contents($file);
        } else {
            $news=htmlspecialchars($_POST[ 'input']);
            file_put_contents($file, $news);
        }
    } else {
        file_put_contents($file, $news);
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Message</title>
    </head>

    <body>
        <div>
            <form method="post">
                <div>
                    <label for="input">Message for news</label>
                    <textarea name="input" id="input">
                        <?php echo $news ;?>
                    </textarea>
                </div>
                <p>Hint:
                    <br>The message is displayed only if the first line consists of the word <strong>yes</strong>. The other lines are various.</p>
                <button type="submit">save</button>
            </form>
        </div>
        <?php
            $message=file( "notification/news.txt",FILE_IGNORE_NEW_LINES);
            if ($message[0]==='yes' ) {
                echo "<div>\n" . "\t<h3>News</h3>\n" . "\t<p>\n";
                for($i=1;$i<count($message);$i++){
                    echo "\t".htmlspecialchars($message[$i]). "<br>\n";
                }
                echo "\t</p>\n" . "</div>";
            }
        ?>
    </body>

    </html>