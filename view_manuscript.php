<?php
session_start();
/* if ($_SESSION['editor id'] === null) {
    header("Location: ./login.php");
} */

include('connection.php');
$manuscriptId = $_GET['manuscriptId'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view_manuscript</title>
    <link rel="stylesheet" href="./css/internalcss.css">

</head>

<body>

    <header class="c-masthead ">
        <div class="c-masthead__container">

            <div class="app-article-masthead u-sans-serif float-container" data-track-component="article" data-test="masthead-component">
                <div class="app-article-masthead__info float-child">

                    <?php
                    $qry1 = "SELECT * FROM `manuscript submission` ms JOIN `author` a ON ms.`Author id` = a.`Author id` where `Manuscript ID`='$manuscriptId'";
                    $raw = mysqli_query($conn, $qry1);
                    if ($raw != null) {
                        $data = mysqli_fetch_array($raw);
                    } else {
                        echo "No data Found";
                    }

                    ?>
                    <h1 class="c-article-title" data-test="article-title" data-article-title=""><?php echo  $data["Manu Name"]; ?></h1>
                    <div class="ul2">
                        <ul class="c-article-identifiers gar">

                            <li class="c-article-identifiers__item" data-test="article-category">Research article</li>

                            <li class="c-article-identifiers__item">
                                <a href="#" data-track="click" data-track-action="open access" data-track-label="link" class="u-color-open-access" data-test="open-access">Open access</a>
                            </li>



                            <li class="c-article-identifiers__item">
                                <a href="#article-info" data-track="click" data-track-action="publication date" data-track-label="link">Published: <time datetime="<?php echo  $data["Submission Date"]; ?>"><?php echo  $data["Submission Date"]; ?></time></a>
                            </li>
                        </ul>
                        <ul class="c-article-identifiers c-article-identifiers--cite-list">
                            <li class="c-article-identifiers__item ga">
                                <span data-test="journal-volume">Volume&nbsp;21</span>, article&nbsp;number&nbsp;<span data-test="article-number">384</span>, (<span data-test="article-publication-year">2023</span>)

                            </li>
                            <li class="c-article-identifiers__item c-article-identifiers__item--cite ga">
                                <a href="#citeas" data-track="click" data-track-action="cite this article" data-track-category="article body" data-track-label="link">Cite this article</a>

                            </li>
                        </ul>
                    </div>


                    <div class="app-article-masthead__buttons" data-test="download-article-link-wrapper">

                        <div class="c-pdf-container">
                            <div class="c-pdf-download u-clear-both u-mb-16">
                                <a href="" class=" c-pdf-download__link" data-article-pdf="true" data-readcube-pdf-url="true" data-test="pdf-link" data-draft-ignore="true" data-track="click" data-track-action="download pdf" data-track-label="button" data-track-external="" download="">
                                    <span class="c-pdf-download__text">Download PDF</span>
                                  

                                </a>
                            </div>
                        </div>


                        <?php
                        if (isset($_SESSION['editor id'])) { ?>
                            <div class="required-reviewer-container" onclick="openPopup()">
                                <div class="required-reviewer">
                                    <a href="#" class="require-reviewer">
                                        <span class="required-reviewe">Recruit Reviewer</span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="app">
                            <p class="app-article-masthead__access">
                               
                                You have full access to this <a href="#" data-track="click" data-track-action="open access" data-track-label="link">open access</a> article
                            </p>

                        </div>

                    </div>
                </div>

                <!--- second  div-->
                <div class="app-article-masthead__brand float-child">


                    <a href="#" class="app-article-masthead__journal-link" data-track="click" data-track-action="journal homepage" data-track-label="link">
                        <picture>
                            <img src="http://www.gravatar.com/avatar/9017a5f22556ae0eb7fb0710711ec125?s=128" alt="">
                        </picture>
                        <span class="app-article-masthead__journal-title"><?php echo  $data["Name"]; ?></span>
                    </a>

                </div>
            </div>
        </div>
    </header>
    <center>

        <h2 class="c-article-section__title js-section-title js-c-reading-companion-sections-item" id="Abs1">Abstract</h2>

        <div class="container_comp">
            <div class="container_p">
                <div class="c-article-section__content" id="Abs1-content">
                    <h3 class="c-article__sub-heading" data-test="abstract-sub-heading">Background</h3>
                    <p>Components of social connection are associated with mortality, but research examining their independent and combined effects in the same dataset is lacking. This study aimed to examine the independent and combined associations between functional and structural components of social connection and mortality.

                    </p>
                    <h3 class="c-article__sub-heading" data-test="abstract-sub-heading">Methods</h3>
                    <p>Analysis of 458,146 participants with full data from the UK Biobank cohort linked to mortality registers. Social connection was assessed using two functional (frequency of ability to confide in someone close and often feeling lonely) and three structural (frequency of friends/family visits, weekly group activities, and living alone) component measures. Cox proportional hazard models were used to examine the associations with all-cause and cardiovascular disease (CVD) mortality.</p>
                    <h3 class="c-article__sub-heading" data-test="abstract-sub-heading">Results</h3>
                    <p>Over a median of 12.6&nbsp;years (IQR 11.9–13.3) follow-up, 33,135 (7.2%) participants died, including 5112 (1.1%) CVD deaths. All social connection measures were independently associated with both outcomes. Friends/family visit frequencies &lt; monthly were associated with a higher risk of mortality indicating a threshold effect. There were interactions between living alone and friends/family visits and between living alone and weekly group activity. For example, compared with daily friends/family visits-not living alone, there was higher all-cause mortality for daily visits-living alone (HR 1.19 [95% CI 1.12–1.26]), for never having visits-not living alone (1.33 [1.22–1.46]), and for never having visits-living alone (1.77 [1.61–1.95]). Never having friends/family visits whilst living alone potentially counteracted benefits from other components as mortality risks were highest for those reporting both never having visits and living alone regardless of weekly group activity or functional components. When all measures were combined into overall functional and structural components, there was an interaction between components: compared with participants defined as not isolated by both components, those considered isolated by both components had higher CVD mortality (HR 1.63 [1.51–1.76]) than each component alone (functional isolation 1.17 [1.06–1.29]; structural isolation 1.27 [1.18–1.36]).

                    </p>
                    <h3 class="c-article__sub-heading" data-test="abstract-sub-heading">Conclusions</h3>
                    <p>This work suggests (1) a potential threshold effect for friends/family visits, (2) that those who live alone with additional concurrent markers of structural isolation may represent a high-risk population, (3) that beneficial associations for some types of social connection might not be felt when other types of social connection are absent, and (4) considering both functional and structural components of social connection may help to identify the most isolated in society.</p>
                </div>
            </div>


            <!--Reviewer's comment form-->

            <div>
                <?php
                if (isset($_SESSION['reviewer id'])) {
                    $reviewerID = $_SESSION['reviewer id'];
                    include("./reviewer_comment_box.php");
                } else {
                    echo "";
                }

                ?>

                <div>
                    <!--   comment list for editor -->
                    <?php
                    if (isset($_SESSION['editor id'])) {
                        include("comment_list_view.php");
                    } else {
                        echo "no editor found";
                    }

                    ?>

                </div>
            </div>



        </div>



    </center>


    <!---<button onclick="openPopup()">Open Popup</button>-->

    <?php
    if (isset($_SESSION['editor id'])) { ?>

        <div class="overlay" id="overlay">

            <div class="popup">
                <span class="close-btn" onclick="closePopup()">&times;</span>
                <h2>Available Reviewers</h2><br><br>
                <form action="./request_reviewer.php" method="post">
                    <input type="submit" value="Submit" class="btn">
                    <input type="hidden" id="manuscriptId" name="manuscriptId" value="<?php echo  $manuscriptId ?>">       
                    <?php
                    $qry = "SELECT * FROM `reviewer` WHERE `reviewer`.`Topic` IN (SELECT manuscript_subject.subject from manuscript_subject WHERE manuscript_subject.manuscript_id = $manuscriptId)
                     AND `Reviewer ID` NOT IN ( SELECT `Reviewer ID` from `review_request_temp` WHERE `Manuscript ID` = $manuscriptId)
                     AND `Availability` = 1;";
                    $data = mysqli_query($conn, $qry);
                    $numRows = mysqli_num_rows($data);
                    if($numRows > 0) {
                   
                        while ($arr =  mysqli_fetch_array($data)) {

                    ?>
                        <div class="reviewer">
                            <div>
                                <img src="http://www.gravatar.com/avatar/9017a5f22556ae0eb7fb0710711ec125?s=128" alt="Reviewer 1" class="avatar">
                            </div>
                            <div>
                                <div>
                                    <h3><?php echo $arr["Name"]; ?></h3>
                                </div>
                                <div class="reviewer-info">
                                    <p>Expert in: <?php echo $arr["Topic"]; ?><br>
                                        Qualities: Great insights, needs more examples, clear and concise.</p>

                                </div>

                            </div>

                            <div>
                                <input type="checkbox" id="<?php echo $arr["Reviewer ID"]; ?>" name="reviewer_ids[]" value="<?php echo $arr["Reviewer ID"]; ?>">
                                <!--     <a href="" class="btn">Request Reviewer</a> -->

                            </div>
                        </div>
                        <!--   Additional content goes here -->
                    <?php }  }  else echo "<br> <br> No Reviewer Available Now";?>
                </form>
            </div>
        </div>

    <?php } ?>

    <script src="./script/scriot.js"></script>
</body>

</html>