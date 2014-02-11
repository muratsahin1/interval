<!DOCTYPE html>
<html class="full" lang="en">
<!-- The full page image background will only work if the html has the custom class set to it! Don't delete it! -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Interval Analysis</title>
    <link href='http://fonts.googleapis.com/css?family=Quicksand:300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Exo+2:300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS for the 'Full' Template -->
    <link href="css/the-big-picture.css" rel="stylesheet">

    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
            tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
        });
    </script>
    <script type="text/javascript"
        src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
    </script>

</head>

<body>

    <nav class="navbar navbar-fixed-bottom navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">About</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#about">Interval-based linear systems</a>
                    </li>
                    <li><a href="#services">Root-finding</a>
                    </li>
                    <li><a href="#contact">Global optimization</a>
                    </li>
                    <li><a href="#contact">Interval-calculator</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <h1>Interval Arithmetic</h1>
                <h2>Basics and nominations</h2>
                <p>$X=[\underline{a},\overline{a}]$ is a closed interval if $X=\{x\in\mathbb{R}:\underline{a}\leq x\leq\overline{a} \}$. The set of all closed intervals is denoted by the $\mathbb{IR}$ symbol.
                    Obviously $\mathbb{R}\subset\mathbb{IR}$ because $\mathbb{R}\ni x=[x,x]\in\mathbb{IR}$.
                    We say that $[\underline{X},\overline{X}]<[\underline{Y},\overline{Y}]$ if and only if $\overline{X}<\underline{Y}$.</p>
                <h2>Operations on intervals</h2>
                <p>Let $\circ\in\{+,-,\cdot,/\}$ a basic operation and $[a],[b]\in\mathbb{IR}$. Then
                    $$[a]\circ[b]=\{a\circ b:a\in[a],b\in[b]\}$$
                    Specially:
                    $$[a]+[b]=[\underline{a}+\underline{b},\overline{a}+\overline{b}],$$
                    $$[a]-[b]=[\underline{a}-\overline{b},\overline{a}-\underline{b}],$$
                    $$[a]\cdot[b]=[\min(\underline{a}\underline{b},\underline{a}\overline{b},\overline{a}\underline{b},\overline{a}\overline{b}),\max(\underline{a}\underline{b},\underline{a}\overline{b},\overline{a}\underline{b},\overline{a}\overline{b})],$$
                    $$[a]/[b]=[a]\cdot[1/\overline{b},1/\underline{b}]\,\,\,\,\text{(if and only if }0\notin [b]\text{).}$$
                </p>
                <h2>Algebraic properties</h2>
            </div>
        </div>
    </div>


    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <!--<script src="js/proba.js"></script>-->

</body>

</html>
