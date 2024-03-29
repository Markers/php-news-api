<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *, :after, :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg, video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns:repeat(1, minmax(0, 1fr))
        }

        @media (min-width: 640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns:repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
### 번역 API

<br/>
<div class="content"><br/>
    <h1>PHP Annotated – June 2022</h1>
    <div class="post-info"><br/>
        <img src="https://secure.gravatar.com/avatar/269798998e24876e4f3ea6f6d1effdc7?s=200&amp;r=g" width="200"
             height="200" alt="Roman Pronskiy" loading="lazy"
             class="avatar avatar-200 wp-user-avatar wp-user-avatar-200 photo avatar-default"><br/>
        <div class="post-info__text"><br/> <a href="https://blog.jetbrains.com/author/rpronskiy">Roman Pronskiy</a>
            <br/>
            <time class="publish-date" data-year="2022" data-month="06" data-day="16"
                  datetime="2022-06-16"></time>
            <br/></div>
        <br/>
    </div>
    <br/>
    <div id="ez-toc-container" class="ez-toc-v2_0_17 counter-hierarchy ez-toc-transparent"><br/>
        <div class="ez-toc-title-container"><br/>
            <p class="ez-toc-title">Table of Contents</p><br/><span class="ez-toc-title-toggle"><a
                    class="ez-toc-pull-right ez-toc-btn ez-toc-btn-xs ez-toc-btn-default ez-toc-toggle"
                    style="display: none;"><i class="ez-toc-glyphicon ez-toc-icon-toggle"></i></a></span>
        </div>
        <br/>
        <nav>
            <ul class="ez-toc-list ez-toc-list-level-1">
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#News"
                                                                    title="News">News</a></li>
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-2"
                                                                    href="#PHP_Core" title="PHP Core">PHP Core</a></li>
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-3" href="#Tools"
                                                                    title="Tools">Tools</a></li>
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-4"
                                                                    href="#PhpStorm" title="PhpStorm">PhpStorm</a></li>
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-5" href="#Symfony"
                                                                    title="Symfony">Symfony</a></li>
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-6" href="#Laravel"
                                                                    title="Laravel">Laravel</a></li>
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-7" href="#Misc"
                                                                    title="Misc">Misc</a></li>
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-8"
                                                                    href="#Community" title="Community">Community</a>
                </li>
            </ul>
        </nav>
    </div>
    <br/>
    <p><a href="https://blog.jetbrains.com/phpstorm/2022/06/php-annotated-june-2022/"> <img class="alignnone
            size-full"
                                                                                            src="https://blog.jetbrains.com/wp-content/uploads/2022/06/php-annotated-blog-featured-image-1280x600-1.png"
                                                                                            alt="PHP Annotated Monthly"
                                                                                            width="900"></a></p><br/>
    <p>Greetings everyone!</p><br/>
    <p>Welcome to the June installment of PHP Annotated, where we’ll catch up on the most interesting things that have
        happened in the PHP world over the last month, including curated news, articles, tools, and videos.</p><br/>
    <blockquote>
        <p><br/> Kudos to <a href="https://twitter.com/s_panteleev">Sergey Panteleev</a> for helping compile the June
            edition of PHP Annotated.</p>
    </blockquote>
    <br/>
    <p><span id="more-257207"></span></p><br/>
    <style>
        img.alignico {
            margin-right: 10px;
            margin-top: 5px;
            float: left;
        }

        main ul:not([class]):not([id]) li,
        main .article-section .content ul:not([class]):not([id]) > li {
            padding-bottom: 18px;
        }

        summary {
            display: list-item;
            cursor: pointer;
            font-style: italic;
        }

        main ul:not([class]):not([id]) li,
        main .article-section .content ul:not([class]):not([id]) > li ul li {
            padding-bottom: 0;
        }
    </style>
    <br/>
    <h2 id="news"><span class="ez-toc-section" id="News"></span>News<span class="ez-toc-section-end"></span></h2><br/>
    <ul><br/>
        <li><strong><a href="https://www.php.net/">php.net </a> received a new homepage design!</strong>
            <br><br/>Thanks to Lucas Azevedo and the team for the refreshing look.
        </li>
        <br/>
        <li><strong>❗<a href="https://www.php.net/archive/2022.php#2022-06-09-1">PHP 7.4.30</a>, <a
                    href="https://www.php.net/archive/2022.php#2022-06-09-4"> <strong>PHP
                        8.0.20</strong></a><strong>, and </strong><a
                    href="https://www.php.net/archive/2022.php#2022-06-09-2">PHP 8.1.7</a> have been
                released</strong> <br><br/>This is a security update to the supported branches. All users are
            encouraged to upgrade to the latest version.
        </li>
        <br/>
        <li><strong><a href="https://www.php.net/archive/2022.php#2022-06-09-3">PHP 8.2.0 Alpha 1</a> has been
                released</strong> <br><br/>The first alpha has been released, kicking off the PHP 8.2
            release process. Updates will be released every two weeks on a <a
                href="https://wiki.php.net/todo/php82#timetable">defined schedule</a> with the final
            release expected around November 24.<br/>
            <p>A feature freeze is expected on July 19, meaning some changes might still make it into
                the release. The most notable changes at the moment are as follows:</p><br/>
            <ul><br/>
                <li><a href="https://php.watch/versions/8.2/readonly-classes">readonly Classes</a>
                </li>
                <br/>
                <li><a href="https://php.watch/versions/8.2/true-type"> <code>true</code></a><a
                        href="https://php.watch/versions/8.2/true-type"> type</a></li>
                <br/>
                <li><a href="https://php.watch/versions/8.2/null-false-types">Allow </a> <a
                        href="https://php.watch/versions/8.2/null-false-types">
                        <code>null</code></a><a href="https://php.watch/versions/8.2/null-false-types"> and </a> <a
                        href="https://php.watch/versions/8.2/null-false-types">
                        <code>false</code></a><a href="https://php.watch/versions/8.2/null-false-types"> as standalone
                        types</a></li>
                <br/>
                <li><a href="https://php.watch/versions/8.2/backtrace-parameter-redaction">Sensitive
                        Parameter value redaction support</a></li>
                <br/>
                <li><a href="https://php.watch/versions/8.2/dynamic-properties-deprecated">Dynamic
                        Properties are deprecated</a></li>
                <br/>
                <li><a href="https://php.watch/versions/8.2/partially-supported-callable-deprecation">Partially-supported
                        callable are deprecated</a></li>
                <br/>
                <li><a href="https://php.watch/versions/8.2/$%7Bvar%7D-string-interpolation-deprecated">
                        <code>${var}</code></a><a
                        href="https://php.watch/versions/8.2/$%7Bvar%7D-string-interpolation-deprecated">
                        string interpolation deprecated</a></li>
                <br/>
            </ul>
            <br/>
            <p>For a complete list of changes, see <a href="https://php.watch/versions/8.2">php.watch/versions/8.2 </a>.
            </p> <br/>
            <p>If you are on Mac, you can try PHP 8.2 with homebrew via the Nightly channel thanks
                to <a href="https://github.com/shivammathur/homebrew-php">shivammathur/homebrew-php
                </a>. </p> <br/>
            <p>Otherwise, <a href="https://hub.docker.com/_/php?tab=tags&amp;page=1&amp;name=8.2.0">Docker
                    images</a> are probably the best option to try it with no hassle.</p>
        </li>
        <br/>
        <li><strong><a href="https://github.com/php-fig/per-coding-style">PER Coding Style</a> has been tagged
                1.0.0</strong> <br><br/>PER Coding Style 1.0.0 is the same as PSR-12. This recommendation
            will now evolve much faster to keep up with all the new features that we’re getting in the
            PHP language.<br><br/>Congratulations to the whole working group!<br/>
            <blockquote class="twitter-tweet"><br/>
                <p lang="en" dir="ltr">If you don’t know what a PER is, it’s similar to a PSR but
                    it’s not set in stone, it’s meant to evolve rapidly over time, so the coding style
                    is the perfect example where a PER is the best way to go.</p><br/>
                <p>More information about the PER workflow here: <a
                        href="https://t.co/jlrrX38AJQ">https://t.co/jlrrX38AJQ </a></p> <br/>
                <p>— PHP-FIG (@phpfig) <a
                        href="https://twitter.com/phpfig/status/1535140192209756162?ref_src=twsrc%5Etfw">June
                        10, 2022</a></p>
            </blockquote>
            <br/>
        </li>
        <br/>
        <li><strong><a
                    href="https://blog.jetbrains.com/phpstorm/2022/05/phpstorm-2022-2-early-access-program-is-open/">PhpStorm
                    2022.2 Early Access Program Is Open</a> </strong> <br><br/>Built-in Rector support, lots of
            improvements for generics in PHP, and more.
        </li>
        <br/>
        <li><strong><a href="https://surveys.jetbrains.com/s3/t-developer-ecosystem-survey-2022">Developer
                    Ecosystem Survey 2022</a> </strong> <br><br/>Take part in the yearly ecosystem survey for
            the chance to win a MacBook Pro, Xbox Series X, PlayStation 5, or other prizes.
        </li>
        <br/>
    </ul>
    <br/>
    <h2 id="php_core"><span class="ez-toc-section" id="PHP_Core"></span>PHP Core<span class="ez-toc-section-end"></span>
    </h2><br/>
    <p>Most of the Core news is covered in detail in the <a
            href="https://thephp.foundation/blog/2022/05/30/php-core-roundup-2/"> <strong>PHP Core Roundup
                series</strong></a> from the PHP Foundation. The third episode of this series is coming soon, so
        we’ll only mention it briefly:</p><br/>
    <ul><br/>
        <li>✅ <a href="https://wiki.php.net/rfc/true-type">RFC: Add true type</a> #PHP 8.2<br><br/>In
            addition to <code>null</code> and <code>false</code> pseudotypes, PHP will now have a standalone
            <code>true</code> type, which is the natural counterpart of <code>false</code>.<br/>
            <p>For more details, listen to Derik Rethans’ <a href="https://phpinternals.news/102">PHP
                    Internals News podcast</a> with George P. Banyard, the author of this change.</p>
        </li>
        <br/>
        <li>✅ <a href="https://wiki.php.net/rfc/undefined_property_error_promotion">RFC: Undefined Property
                Error Promotion</a> #PHP 9.0
        </li>
        <br/>
        <li>✅ <a href="https://wiki.php.net/rfc/partially-supported-callables-expand-deprecation-notices">RFC:
                Expand deprecation notice scope for partially supported callables</a> #PHP 8.2
        </li>
        <br/>
        <li>📊 <a href="https://wiki.php.net/rfc/stricter_implicit_boolean_coercions">RFC: Stricter implicit
                boolean coercion</a> #PHP 8.2
        </li>
        <br/>
        <li>📊 <a href="https://wiki.php.net/rfc/global_login">RFC: Create a global login system for
                php.net</a> <br><br/>The RFC proposes to create an SSO for *.php.net sites. The implementation
            plan, however, is unclear, so it likely will not make it past the first attempt.
        </li>
        <br/>
        <li>📊 <a href="https://wiki.php.net/rfc/rng_extension">RFC: Random Extension 5.x</a> #PHP
            8.2<br><br/>Kudos to Go Kudo for this RFC and for their persistence after the <a
                href="https://wiki.php.net/rfc/object_scope_prng">previous attempt</a>.
        </li>
        <br/>
        <li>🤔 <a href="https://wiki.php.net/rfc/fetch_property_in_const_expressions">RFC: Fetch properties in
                const expressions</a> #PHP 8.2<br><br/>
            <pre class="EnlighterJSRAW" data-enlighter-language="php" data-enlighter-linenumbers="false"
                 data-enlighter-title>enum A: string {    <br/>    case B = 'B';<br/>    // This is currently not permitted<br/>    const C = [self::B-&gt;value =&gt; self::B];<br/>}<br/></pre>
            <br><br/>There are some userland examples of where this could be quite useful. Take <a
                href="https://github.com/symfony/symfony/pull/46363#issuecomment-1128578078">Symfony and
                #[Target]</a>, for instance.
        </li>
        <br/>
        <li>🤔 <a href="https://wiki.php.net/rfc/auto-capture-closure">[RFC] Short Closures 2.0</a>
            <br><br/>Originally proposed by Nuno Maduro and Larry Garfield, and now picked up by Arnaud Le
            Blanc, this RFC proposed extending arrow functions by allowing multiple statements:<br><br/>
            <pre class="EnlighterJSRAW" data-enlighter-language="php" data-enlighter-linenumbers="false"
                 data-enlighter-title>fn () {    <br/>    $tmp = $a + $b;<br/>    return $tmp;<br/>}<br/></pre>
            <br/></li>
        <br/>
        <li><a href="https://thephp.foundation/blog/2022/05/06/interview-with-core-developers/">Interview with
                the PHP Foundation Core Developers</a> supplemented with answers from Arnaud Le Blanc.
        </li>
        <br/>
    </ul>
    <br/>
    <h2 id="tools"><span class="ez-toc-section" id="Tools"></span>Tools<span class="ez-toc-section-end"></span></h2>
    <br/>
    <ul><br/>
        <li><a href="https://indigostack.app/">Indigo </a> (beta) — This tool aims to revolutionize the way
            you configure and run local dev environments on Mac.
        </li>
        <br/>
        <li>The <a href="https://paragonie.com/blog/2022/06/recap-our-contributions-more-secure-internet">Paragon
                Initiative Enterprises</a> team released <a href="https://github.com/paragonie/easy-ecc">Easy-ECC </a>
            1.0.0, a tool making it easier to
            work with elliptic curve cryptography on PHP, and <a href="https://github.com/paragonie/paseto">PASETO </a>,
            a more secure alternative to JWT.
        </li>
        <br/>
        <li><a href="https://github.com/minicli/minicli">minicli/minicli </a> – A minimalist, dependency-free
            framework for building CLI-centric PHP applications.
        </li>
        <br/>
        <li><a href="https://github.com/crwlrsoft/url">crwlr/query-string </a> – A Swiss Army knife for URLs.
            It allows you to create, access, and manipulate query strings for HTTP requests very
            conveniently. See the <a
                href="https://www.crwlr.software/blog/dealing-with-http-url-query-strings-in-php">article </a>
            for more details.
        </li>
        <br/>
        <li><a href="https://github.com/voku/simple_html_dom">voku/simple_html_dom </a> – A modern, simple
            HTML DOM Parser for PHP.
        </li>
        <br/>
        <li><a href="https://mlocati.github.io/php-cs-fixer-configurator/#version:3.8">PHP-CS-Fixer
                Configurator</a> – A nice website with all of the <a
                href="https://github.com/FriendsOfPHP/PHP-CS-Fixer">PHP CS Fixer</a> options and their
            descriptions.
        </li>
        <br/>
        <li><a href="https://github.com/IvanGrigorov/VMValidator">IvanGrigorov/VMValidator </a> – A set of
            attributes to validate PHP models.
        </li>
        <br/>
        <li><a href="https://github.com/thecodingmachine/graphqlite">thecodingmachine/graphqlite </a> – This
            tool allows you to use PHP Attributes/Annotations to declare GraphQL API.
        </li>
        <br/>
        <li><a href="https://github.com/exakat/php-static-analysis-tools">exakat/php-static-analysis-tools
            </a> – A reviewed list of useful PHP static analysis tools. It’s not only Psalm/PHPStan. There
            is also <a href="https://www.jetbrains.com/help/qodana/qodana-php.html">Qodana PHP</a>, a tool
            by JetBrains that brings all the PhpStorm smart checks to CI pipelines.
        </li>
        <br/>
        <li><a href="https://github.com/nmcteam/3dash">nmcteam/3dash </a> – Tiny static site generator for
            PHP. <a href="https://sculpin.io/">Sculpin </a> and <a href="https://jigsaw.tighten.com/">Jigsaw </a> are
            cool, but this small tool is really neat
            and has a very simple API. Check out the official website for a quick example: <a
                href="https://3dash.dev/">3dash.dev </a>.
        </li>
        <br/>
    </ul>
    <br/>
    <h2 id="phpstorm"><span class="ez-toc-section" id="PhpStorm"></span>PhpStorm<span class="ez-toc-section-end"></span>
    </h2><br/>
    <ul><br/>
        <li><a href="https://plugins.jetbrains.com/plugin/18813-ddev-integration">DDEV Integration – IntelliJ
                IDEs Plugin</a> – A beta version of the <a href="https://github.com/drud/ddev">DDEV </a>
            Integration Plugin for PhpStorm.
        </li>
        <br/>
        <li><a
                href="https://medium.com/@dkhorev/boost-your-productivity-in-laravel-with-advanced-phpstorm-setup-34a354efbbce">Boost
                your productivity in Laravel with advanced PhpStorm setup</a> by Dmitry Khorev.
        </li>
        <br/>
        <li><a href="https://stitcher.io/blog/clean-and-minimalistic-phpstorm">Clean and minimalistic
                PhpStorm</a> by Brent Roose.
        </li>
        <br/>
    </ul>
    <br/>
    <h2 id="symfony"><span class="ez-toc-section" id="Symfony"></span>Symfony<span class="ez-toc-section-end"></span>
    </h2><br/>
    <ul><br/>
        <li><a href="https://symfony.com/blog/symfony-6-1-0-released">Symfony 6.1</a> has been released and
            includes lots of <a href="https://symfony.com/blog/symfony-6-1-curated-new-features">great new
                features</a>. <br><br/>
            <blockquote class="twitter-tweet"><br/>
                <p lang="en" dir="ltr">Symfony 6.1 was released 3 hours ago. We just merged the upgrade
                    PR and shipped it to production 🚀 Everything runs smoothly.</p><br/>
                <p>The application is ±10 years old, has 10k+ classes and is now handling 20k rpm.</p><br/>
                <p>Happy Friday everyone 😎<a href="https://t.co/Ce263ESQ6a">https://t.co/Ce263ESQ6a </a>
                    <a href="https://t.co/RKJtEFrFfZ">https://t.co/RKJtEFrFfZ </a> <a
                        href="https://t.co/5SJrmPPtxK">pic.twitter.com/5SJrmPPtxK </a></p> <br/>
                <p>— Ruud Kamphuis (@Ruud_) <a
                        href="https://twitter.com/Ruud_/status/1530135229444370433?ref_src=twsrc%5Etfw">May
                        27, 2022</a></p>
            </blockquote>
            <br/>
        </li>
        <br/>
        <li><a href="https://symfony.com/blog/get-certified-on-symfony-6-and-twig-3">Get certified on Symfony
                6 and Twig 3</a> <br><br/>Symfony 6 and Twig 3 online certifications are now available. Both
            exams have been reworked from the ground up.
        </li>
        <br/>
        <li><a href="https://symfony.com/blog/a-week-of-symfony-806-6-12-june-2022">A Week of Symfony #806
                (6-12 June 2022)</a>.
        </li>
        <br/>
        <li><a href="https://www.strangebuzz.com/en/blog/initializing-your-symfony-project-with-solid-foundations">Initializing
                your Symfony project with solid foundations</a> by Loïc Vernet.
        </li>
        <br/>
        <li><a href="https://tomasvotruba.com/blog/how-to-test-symfony-routes-to-make-huge-refactorings-safe/">How
                to test Symfony routes to make huge refactoring safe</a> by Tomas Votruba.
        </li>
        <br/>
    </ul>
    <br/>
    <h2 id="laravel"><span class="ez-toc-section" id="Laravel"></span>Laravel<span class="ez-toc-section-end"></span>
    </h2><br/>
    <ul><br/>
        <li><a href="https://laravel-comments.com/">spatie/laravel-comments-livewire </a> – A new, paid
            Livewire package from Spatie to associate comments with models in your Laravel application.
        </li>
        <br/>
        <li><a href="https://github.com/laravel/vite-plugin">laravel/vite-plugi </a> – <a
                href="https://vitejs.dev/">Vite </a> is a modern frontend build tool that provides a fast
            development environment and bundles your code for production. Laravel now integrates seamlessly
            with Vite by providing an official plugin and Blade directive to load your assets for
            development and production.
        </li>
        <br/>
        <li><a href="https://github.com/hasinhayder/hydra">hasinhayder/hydra </a> – A zero-config API
            boilerplate with Laravel 9x + Laravel Sanctum that comes with an excellent user and role
            management API out of the box.
        </li>
        <br/>
        <li><a href="https://artisan.page/">Laravel Artisan Cheatsheet</a> – An online reference for Laravel’s
            built-in artisan commands and their options.
        </li>
        <br/>
        <li><a href="https://github.com/codestudiohq/laravel-totem">codestudiohq/laravel-totem </a> – The tool
            allows you to manage your Laravel Schedule from a well-organized dashboard.
        </li>
        <br/>
        <li><a href="https://github.com/worksome/request-factories">worksome/request-factories </a> – Test
            requests in Laravel without all the boilerplate.
        </li>
        <br/>
        <li><a href="https://martinjoo.dev/35-eloquent-recipes">35 Laravel Eloquent Recipes</a> by Martin
            Joo.
        </li>
        <br/>
        <li><a href="https://laravel-news.com/laravel-route-organization-tips">Laravel Route Grouping: 6
                Techniques to Organize Routes</a> by Povilas Korop.
        </li>
        <br/>
        <li><a href="https://www.iankumu.com/blog/laravel-dynamic-scheduling/">How To Implement Laravel
                Dynamic Scheduling</a> by Ian Kumu.
        </li>
        <br/>
        <li><a href="https://laravel-news.com/controller-refactor">Restructuring a Laravel Controller using
                Services, Events, Jobs, Actions, and more</a> by Povilas Korop.
        </li>
        <br/>
    </ul>
    <br/>
    <h2 id="misc"><span class="ez-toc-section" id="Misc"></span><strong>Misc</strong><span
            class="ez-toc-section-end"></span></h2><br/>
    <ul><br/>
        <li><a href="https://stitcher.io/blog/php-enum-style-guide">My PHP enum style guide</a> by Brent
            Roose.
        </li>
        <br/>
        <li><a href="https://markbakeruk.net/2022/06/06/list-o-mania/">List-o-mania </a> by Mark Baker. An
            article on PHP’s <code>list</code> construct with some clever tricks and a few of its
            limitations.
        </li>
        <br/>
        <li><a href="https://www.exakat.io/en/the-very-useful-variadic-argument/">The very useful variadic
                argument</a> by Damien Seguy.
        </li>
        <br/>
        <li><a href="https://www.exakat.io/en/reviewing-property-declaration-in-php/">Reviewing Property
                Declaration In PHP</a> by Damien Seguy.
        </li>
        <br/>
    </ul>
    <br/>
    <h2 id="community"><span class="ez-toc-section" id="Community"></span><strong>Community</strong><span
            class="ez-toc-section-end"></span></h2><br/>
    <ul><br/>
        <li><a href="https://getparthenon.com/blog/2022-php-conferences-list/">2022 PHP Conferences List</a>.
        </li>
        <br/>
        <li><a href="https://www.etsy.com/shop/DeveloperWear">Check out these funny t-shirts</a> by <a
                href="https://twitter.com/rdohms">Rafael Dohms</a>: <br><br/><img
                src="https://blog.jetbrains.com/wp-content/uploads/2022/06/il_1588xN.3968791093_8rig.webp" alt
                width="300"></li>
        <br/>
        <li><a href="https://www.exakat.io/en/where-can-you-get-an-elephpant-php-elephant/">Where can you get
                an elephpant?</a> <br/>
            <ul><br/>
                <li>Light blue and pink ones: <a href="https://www.elephpant.com/">elephpant.com </a>.</li>
                <br/>
                <li>Blue <a href="https://www.exakat.io/product/inphpinity/">PHP 8 inphpinity</a>: <a
                        href="https://www.exakat.io/product/inphpinity/">exakat.io </a>.
                </li>
                <br/>
                <li>White, Joker, and Dark blue: <a href="https://shop.confoo.ca/toys">confoo.ca </a>.</li>
                <br/>
                <li>Orange: <a href="https://thelia.net/index.php/thelia-elephpant.html">thelia.net </a>.
                </li>
                <br/>
                <li>Italy tricolor: <a
                        href="https://shop.grusp.org/product/aida-phpday-elephpant/?v=796834e7a283">grusp.org
                    </a>.
                </li>
                <br/>
                <li>Orange php[architect]: <a href="http://www.phparch.com">phparch.com/swag </a>.</li>
                <br/>
                <li>Red Laravel: <a href="https://www.phparch.com/swag/laravel-plush-elephpant/">phparch.com/swag </a>.
                </li>
                <br/>
            </ul>
            <br/>
        </li>
        <br/>
        <li>Did you know that WordPress has an adorable mascot too?<br><br/>
            <blockquote class="twitter-tweet"><br/>
                <p lang="en" dir="ltr"><a
                        href="https://twitter.com/hashtag/Wapuu?src=hash&amp;ref_src=twsrc%5Etfw">#Wapuu </a>
                    will be everywhere at WordCamp Europe! How many different pictures can you get of him?
                    Post them at <a href="https://t.co/iVD2K7rvx2">https://t.co/iVD2K7rvx2 </a> so we can
                    see them all!</p> <br/>
                <p>📸 “Wapuu ready to travel to <a
                        href="https://twitter.com/hashtag/WCEU?src=hash&amp;ref_src=twsrc%5Etfw">#WCEU
                    </a>” by Nicholas Garofalo on the <a
                        href="https://twitter.com/hashtag/WordPress?src=hash&amp;ref_src=twsrc%5Etfw">#WordPress
                    </a> Photo Directory <a href="https://t.co/90SvbhINp6">https://t.co/90SvbhINp6
                    </a> <a href="https://t.co/0YfURIAV5X">pic.twitter.com/0YfURIAV5X </a></p> <br/>
                <p>— WordPress (@WordPress) <a
                        href="https://twitter.com/WordPress/status/1532344032327761922?ref_src=twsrc%5Etfw">June
                        2, 2022</a></p>
            </blockquote>
            <br/>
        </li>
        <br/>
    </ul>
    <br/>
    <p>That’s all for today – thanks for reading!</p><br/>
    <p>If you have any interesting or useful links to share via PHP Annotated, please leave a comment on this
        post or send me a <a href="https://twitter.com/pronskiy">tweet </a>. </p> <br/>
    <p style="text-align: left;" align="center"><a class="jb-download-button" title="Complete this
                        form and get PHP Annotated Monthly delivered fresh to your email"
                                                   href="https://info.jetbrains.com/PHP-Annotated-Subscription.html">Subscribe
            to PHP
            Annotated</a></p> <br/>
    <p><em>Your JetBrains PhpStorm team</em><br><br/><em>The Drive to Develop</em><br><br/>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </p>
    <br/>
    <div class="content__row"><br/> \t
        <div class="tag-list"><br/> <a href="/phpstorm/tag/laravel/"
                                       class="tag">Laravel</a><br/> <a href="/phpstorm/tag/php/"
                                                                       class="tag">PHP</a><br/> <a
                href="/phpstorm/tag/php-8-2/" class="tag">PHP 8.2</a><br/> <a
                href="/phpstorm/tag/php-annotated-monthly/" class="tag">PHP Annotated
                Monthly</a><br/> <a href="/phpstorm/tag/rfc/" class="tag">RFC</a><br/> <a
                href="/phpstorm/tag/symfony/" class="tag">symfony</a><br/></div>
        <br/>
        <ul class="social"><br/>
            <li><span>Share</span></li>
            <br/>
            <li><a target="_blank"
                   href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fblog.jetbrains.com%2Fphpstorm%2F2022%2F06%2Fphp-annotated-june-2022%2F"
                   rel="noopener noreferrer"><i class="icon-facebook"></i></a></li>
            <br/>
            <li><a target="_blank"
                   href="https://twitter.com/intent/tweet?source=https%3A%2F%2Fblog.jetbrains.com%2Fphpstorm%2F2022%2F06%2Fphp-annotated-june-2022%2F&amp;text=https%3A%2F%2Fblog.jetbrains.com%2Fphpstorm%2F2022%2F06%2Fphp-annotated-june-2022%2F&amp;via=phpstorm"
                   rel="noopener noreferrer"><i class="icon-twitter"></i></a></li>
            <br/>
            <li><a target="_blank"
                   href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fblog.jetbrains.com%2Fphpstorm%2F2022%2F06%2Fphp-annotated-june-2022%2F"
                   rel="noopener noreferrer"><i class="icon-linkedin"></i></a></li>
            <br/>
        </ul>
        <br/>
    </div>
    <br/>
    <div class="content__pagination"><a class="content__pagination-prev"
                                        href="https://blog.jetbrains.com/phpstorm/2022/06/phpstorm-2022-2-eap-3/"> <i
                class="icon-arrow-left"></i>
            PhpStorm 2022.2 EAP #3: Creating Enums</a><a class="content__pagination-next"
                                                         href="https://blog.jetbrains.com/phpstorm/2022/06/phpstorm-2022-1-3-rc/">PhpStorm
            2022.1.3
            RC <i class="icon-arrow-right"></i></a></div>
</div>
<br/>
<div class="container comments-container"><br/>
    <br/>
    <div class="content"><br/>
        <div id="remark42"></div>
        <br/>
    </div>
    <br/>
</div>
<br/> ",
"text": "
<div class="content">
    <h1>PHP 주석 – 2022년 6월 </h1>
    <div class="post-info"><img src="https://secure.gravatar.com/avatar/269798998e24876e4f3ea6f6d1effdc7?s=200&amp;r=g"
                                width="200" height="200" alt="로만 프론스키" loading="lazy" class="avatar avatar-200 wp-user-avatar wp-user-avatar-200
            photo avatar-default">
        <div class="post-info__text"><a href="https://blog.jetbrains.com/author/rpronskiy">로만 프론스키</a>
            <time
                class="publish-date" data-year="2022" data-month="06" data-day="16" datetime="2022-06-16"></time>
        </div>
    </div>
    <div id="ez-toc-container" class="ez-toc-v2_0_17 counter-hierarchy ez-toc-transparent">
        <div class="ez-toc-title-container">
            <p class="ez-toc-title"> 목차</p> <span class="ez-toc-title-toggle"><a class="ez-toc-pull-right
                    ez-toc-btn ez-toc-btn-xs ez-toc-btn-default ez-toc-toggle" style="display: none;"><i
                        class="ez-toc-glyphicon ez-toc-icon-toggle"></i></a></span>
        </div>
        <nav>
            <ul class="ez-toc-list ez-toc-list-level-1">
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#News"
                                                                    title="소식">소식</a></li>
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-2"
                                                                    href="#PHP_Core" title="PHP 코어">PHP 코어</a></li>
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-3" href="#Tools"
                                                                    title="도구">도구</a></li>
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-4"
                                                                    href="#PhpStorm" title="PhpStorm">PhpStorm</a></li>
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-5"
                                                                    href="#Symfony" title="심포니">심포니</a></li>
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-6"
                                                                    href="#Laravel" title="라라벨">라라벨</a></li>
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-7" href="#Misc"
                                                                    title="기타">기타</a></li>
                <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-8"
                                                                    href="#Community" title="지역 사회">지역 사회</a></li>
            </ul>
        </nav>
    </div>
    <p><a href="https://blog.jetbrains.com/phpstorm/2022/06/php-annotated-june-2022/"> <img class="alignnone
            size-full"
                                                                                            src="https://blog.jetbrains.com/wp-content/uploads/2022/06/php-annotated-blog-featured-image-1280x600-1.png"
                                                                                            alt="PHP 주석 월간" width="900"></a>
    </p>
    <p> 안녕하세요!</p>
    <p> PHP Annotated 6월호에 오신 것을 환영합니다. 여기에서는 선별된 뉴스, 기사, 도구 및 비디오를 포함하여 지난 한 달 동안 PHP 세계에서 일어난 가장 흥미로운 일을 따라갈 것입니다.</p>
    <blockquote>
        <p> PHP Annotated 6월호를 컴파일하는 데 도움을 준 <a href="https://twitter.com/s_panteleev">Sergey Panteleev</a> 에게 감사드립니다.
        </p>
    </blockquote>
    <p><span id="more-257207"></span></p>
    <style>
        img.alignico {
            margin-right: 10px;
            margin-top: 5px;
            float: left;
        }

        main ul:not([class]):not([id]) li,
        main .article-section .content ul:not([class]):not([id]) > li {
            padding-bottom: 18px;
        }

        summary {
            display: list-item;
            cursor: pointer;
            font-style: italic;
        }

        main ul:not([class]):not([id]) li,
        main .article-section .content ul:not([class]):not([id]) > li ul li {
            padding-bottom: 0;
        }
    </style>
    <h2 id="news"><span class="ez-toc-section" id="News"></span> 소식<span class="ez-toc-section-end"></span>
    </h2>
    <ul>
        <li><strong><a href="https://www.php.net/">php.net </a> 이 새로운 홈페이지 디자인을 받았습니다!</strong> <br> 상쾌한 모습을 보여주신
            Lucas Azevedo와 팀에 감사드립니다.
        </li>
        <li><strong>❗ <a href="https://www.php.net/archive/2022.php#2022-06-09-1">PHP 7.4.30</a> , <a
                    href="https://www.php.net/archive/2022.php#2022-06-09-4"> <strong>PHP 8.0.20</strong></a>
                <strong>,</strong> <a href="https://www.php.net/archive/2022.php#2022-06-09-2">PHP 8.1.7</a> 이
                출시되었습니다.</strong> <br> 지원되는 분기에 대한 보안 업데이트입니다. 모든 사용자는 최신 버전으로 업그레이드하는 것이 좋습니다.
        </li>
        <li><strong><a href="https://www.php.net/archive/2022.php#2022-06-09-3">PHP 8.2.0 알파 1</a> 이
                출시되었습니다</strong> <br> PHP 8.2 릴리스 프로세스를 시작하는 첫 번째 알파가 릴리스되었습니다. 업데이트는 <a
                href="https://wiki.php.net/todo/php82#timetable">정의된 일정</a> 에 따라 2주마다 릴리스되며 최종 릴리스는 11월
            24일 경으로 예상됩니다.<p> 기능 동결은 7월 19일에 예상되며, 이는 일부 변경 사항이 여전히 릴리스에 포함될 수 있음을 의미합니다. 현재 가장 눈에 띄는
                변화는 다음과 같습니다.</p>
            <ul>
                <li><a href="https://php.watch/versions/8.2/readonly-classes">읽기 전용 클래스</a></li>
                <li><a href="https://php.watch/versions/8.2/true-type"> <code>true</code></a>
                    <a href="https://php.watch/versions/8.2/true-type">타입 </a></li>
                <li><a href="https://php.watch/versions/8.2/null-false-types">독립형 유형으로</a> <a
                        href="https://php.watch/versions/8.2/null-false-types">
                        <code>null</code></a> <a href="https://php.watch/versions/8.2/null-false-types">및 </a> <a
                        href="https://php.watch/versions/8.2/null-false-types">
                        <code>false</code></a> <a href="https://php.watch/versions/8.2/null-false-types">허용 </a></li>
                <li><a href="https://php.watch/versions/8.2/backtrace-parameter-redaction">민감한
                        매개변수 값 수정 지원</a></li>
                <li><a href="https://php.watch/versions/8.2/dynamic-properties-deprecated">동적
                        속성은 더 이상 사용되지 않습니다.</a></li>
                <li><a href="https://php.watch/versions/8.2/partially-supported-callable-deprecation">부분적으로
                        지원되는 콜러블은 더 이상 사용되지 않습니다.</a></li>
                <li><a href="https://php.watch/versions/8.2/$%7Bvar%7D-string-interpolation-deprecated">
                        <code>${var}</code></a> <a
                        href="https://php.watch/versions/8.2/$%7Bvar%7D-string-interpolation-deprecated">문자열
                        보간은 더 이상 사용되지 않음</a></li>
            </ul>
            <p> 전체 변경 사항 목록은 <a href="https://php.watch/versions/8.2">php.watch/versions/8.2
                </a> 를 참조하십시오.</p>
            <p> Mac을 사용하는 경우 <a href="https://github.com/shivammathur/homebrew-php">shivammathur/homebrew-php
                </a> 덕분에 Nightly 채널을 통해 homebrew로 PHP 8.2를 사용해 볼
                수 있습니다.</p>
            <p> 그렇지 않으면 <a href="https://hub.docker.com/_/php?tab=tags&amp;page=1&amp;name=8.2.0">Docker
                    이미지</a> 가 번거로움 없이 시도해 볼 수 있는 가장 좋은 옵션일
                것입니다.</p>
        </li>
        <li><strong><a href="https://github.com/php-fig/per-coding-style">PER
                    코딩 스타일</a> 에 1.0.0 태그가
                지정되었습니다.</strong> <br> PER 코딩 스타일
            1.0.0은 PSR-12와 동일합니다. 이 권장 사항은 이제
            PHP 언어로 제공되는 모든 새로운 기능을 따라잡을 수 있도록
            훨씬 더 빠르게 발전할 것입니다.<br> 전체 작업 그룹을
            축하합니다!
            <blockquote class="twitter-tweet">
                <p lang="en" dir="ltr"> PER이
                    무엇인지 모르면 PSR과 비슷하지만 고정되어 있지
                    않고 시간이 지남에 따라 빠르게 진화하기 때문에
                    코딩 스타일이 PER이 가장 좋은 방법인 완벽한
                    예입니다.</p>
                <p> PER 워크플로에 대한 추가 정보: <a href="https://t.co/jlrrX38AJQ">https://t.co/jlrrX38AJQ
                    </a></p>
                <p> —
                    PHP-FIG(@phpfig) <a
                        href="https://twitter.com/phpfig/status/1535140192209756162?ref_src=twsrc%5Etfw">2022년
                        6월 10일</a></p>
            </blockquote>
        </li>
        <li><strong><a
                    href="https://blog.jetbrains.com/phpstorm/2022/05/phpstorm-2022-2-early-access-program-is-open/">PhpStorm
                    2022.2 얼리
                    액세스 프로그램
                    오픈</a>
            </strong>
            <br> 내장형
            Rector 지원,
            PHP의 제네릭에 대한
            많은 개선 사항 등.
        </li>
        <li><strong><a href="https://surveys.jetbrains.com/s3/t-developer-ecosystem-survey-2022">2022년
                    개발자 생태계 설문조사</a> </strong> <br> 연간 에코시스템 설문조사에 참여하여 MacBook Pro, Xbox Series
            X, PlayStation 5 또는 기타 상품을 받을 수 있는 기회를 잡으십시오.
        </li>
    </ul>
    <h2 id="php_core"><span class="ez-toc-section" id="PHP_Core"></span> PHP 코어<span class="ez-toc-section-end"></span>
    </h2>
    <p> Core 뉴스의 대부분은 PHP Foundation의 <a href="https://thephp.foundation/blog/2022/05/30/php-core-roundup-2/">
            <strong>PHP
                Core Roundup 시리즈</strong></a> 에서 자세히 다룹니다. 이 시리즈의 세 번째 에피소드가 곧 출시될 예정이므로 간략하게만
        언급하겠습니다.</p>
    <ul>
        <li> ✅ <a href="https://wiki.php.net/rfc/true-type">RFC: 트루 타입 추가</a> #PHP 8.2<br>
            <code>null</code> 및 <code>false</code> 의사 유형 외에도 PHP는 이제 독립 실행형 <code>true</code> 유형을 갖게 되며
            이는 <code>false</code> 의 자연스러운 대응입니다.<p> 자세한 내용은 이 변경 사항의 작성자인 George P. Banyard가 제공하는 Derik
                Rethans의 <a href="https://phpinternals.news/102">PHP Internals News 팟캐스트</a> 를
                들어보십시오.</p>
        </li>
        <li> ✅ <a href="https://wiki.php.net/rfc/undefined_property_error_promotion">RFC: 정의되지
                않은 속성 오류 프로모션</a> #PHP 9.0
        </li>
        <li> ✅ <a href="https://wiki.php.net/rfc/partially-supported-callables-expand-deprecation-notices">RFC:
                부분적으로 지원되는 콜러블 #PHP 8.2에 대한 지원 중단 알림 범위 확장</a></li>
        <li> 📊 <a href="https://wiki.php.net/rfc/stricter_implicit_boolean_coercions">RFC:
                더 엄격한 암시적 부울 강제 변환</a> #PHP 8.2
        </li>
        <li> 📊 <a href="https://wiki.php.net/rfc/global_login">RFC: php.net용 글로벌 로그인
                시스템 생성</a> <br> RFC는 *.php.net 사이트에 대한 SSO를 만들 것을 제안합니다. 다만 시행계획이
            불투명해 1차 시도를 넘지 못할 가능성이 크다.
        </li>
        <li> 📊 <a href="https://wiki.php.net/rfc/rng_extension">RFC: 임의 확장 5.x</a> #PHP 8.2<br> 이 RFC 와
            <a href="https://wiki.php.net/rfc/object_scope_prng">이전 시도</a> 이후 의 끈기 에 대해 Go Kudo 에게 감사
            를 전합니다 .
        </li>
        <li> 🤔 <a href="https://wiki.php.net/rfc/fetch_property_in_const_expressions">RFC: const
                표현식에서 속성 가져오기</a> #PHP 8.2 <br>
            <pre class="EnlighterJSRAW" data-enlighter-language="php" data-enlighter-linenumbers="false"
                 data-enlighter-title> 열거형 A: 문자열 {    <br/>    경우 B = &#39;B&#39;;<br/>    // 이것은 현재 허용되지 않습니다.<br/>    const C = [자기::B-&gt;값 =&gt; 자기::B];<br/>}<br/></pre>
            <br>이것이 매우 유용할 수 있는 사용자 영역의 예가 있습니다. 예를 들어 <a
                href="https://github.com/symfony/symfony/pull/46363#issuecomment-1128578078">Symfony
                및 #[Target]</a> 을 사용하십시오.
        </li>
        <li> 🤔 <a href="https://wiki.php.net/rfc/auto-capture-closure">[RFC] 단기 폐쇄 2.0</a>
            <br> 원래 Nuno Maduro와 Larry Garfield가 제안했으며 현재 Arnaud Le Blanc가 채택한 이 RFC는 여러
            명령문을 허용하여 화살표 기능을 확장할 것을 제안했습니다. <br>
            <pre class="EnlighterJSRAW" data-enlighter-language="php" data-enlighter-linenumbers="false"
                 data-enlighter-title> fn() {    <br/>    $tmp = $a + $b;<br/>    반환 $tmp;<br/>}<br/></pre>
        </li>
        <li>Arnaud Le Blanc의 답변으로 보충 <a
                href="https://thephp.foundation/blog/2022/05/06/interview-with-core-developers/">된 PHP
                Foundation 핵심 개발자와의 인터뷰</a> .
        </li>
    </ul>
    <h2 id="tools"><span class="ez-toc-section" id="Tools"></span> 도구<span class="ez-toc-section-end"></span></h2>
    <ul>
        <li><a href="https://indigostack.app/">Indigo </a> (베타) — 이 도구는 Mac에서 로컬 개발 환경을 구성하고
            실행하는 방식을 혁신하는 것을 목표로 합니다.
        </li>
        <li><a href="https://paragonie.com/blog/2022/06/recap-our-contributions-more-secure-internet">Paragon
                Initiative Enterprises</a> 팀은 PHP에서 타원 곡선 암호화 작업을 더 쉽게 해주는 도구인 <a
                href="https://github.com/paragonie/easy-ecc">Easy-ECC </a> 1.0.0과 JWT에 대한
            보다 안전한 대안인 <a href="https://github.com/paragonie/paseto">PASETO </a> 를
            출시했습니다.
        </li>
        <li><a href="https://github.com/minicli/minicli">minicli/minicli </a> – CLI
            중심 PHP 애플리케이션을 구축하기 위한 최소한의 종속성 없는 프레임워크입니다.
        </li>
        <li><a href="https://github.com/crwlrsoft/url">crwlr/query-string </a> –
            URL용 스위스 군용 칼입니다. HTTP 요청에 대한 쿼리 문자열을 매우 편리하게 생성, 액세스 및 조작할 수 있습니다.
            자세한 내용은 <a href="https://www.crwlr.software/blog/dealing-with-http-url-query-strings-in-php">기사
            </a> 를 참조하십시오.
        </li>
        <li><a href="https://github.com/voku/simple_html_dom">voku/simple_html_dom
            </a> – 현대적이고 단순한 PHP용 HTML DOM 파서.
        </li>
        <li><a href="https://mlocati.github.io/php-cs-fixer-configurator/#version:3.8">PHP-CS-Fixer
                Configurator</a> – 모든 <a href="https://github.com/FriendsOfPHP/PHP-CS-Fixer">PHP CS
                Fixer</a> 옵션과 설명이 있는 멋진 웹사이트입니다.
        </li>
        <li><a href="https://github.com/IvanGrigorov/VMValidator">IvanGrigorov/VMValidator
            </a> – PHP 모델을 검증하기 위한 속성 세트입니다.
        </li>
        <li><a href="https://github.com/thecodingmachine/graphqlite">thecodingmachine/graphqlite
            </a> – 이 도구를 사용하면 PHP 속성/주석을 사용하여 GraphQL API를 선언할 수
            있습니다.
        </li>
        <li><a href="https://github.com/exakat/php-static-analysis-tools">exakat/php-static-analysis-tools
            </a> – 유용한 PHP 정적 분석 도구의 검토 목록입니다. 시편/PHPStan
            뿐만이 아닙니다. 모든 PhpStorm 스마트 검사를 CI 파이프라인으로 가져오는
            JetBrains의 도구인 <a href="https://www.jetbrains.com/help/qodana/qodana-php.html">Qodana
                PHP</a> 도 있습니다.
        </li>
        <li><a href="https://github.com/nmcteam/3dash">nmcteam/3dash
            </a> – PHP용 작은 정적 사이트 생성기. <a href="https://sculpin.io/">Sculpin </a> 과
            <a href="https://jigsaw.tighten.com/">Jigsaw
            </a> 는 멋지지만 이 작은 도구는 정말 깔끔하고 API가 매우 간단합니다.
            빠른 예를 보려면 공식 웹사이트를 확인하세요: <a href="https://3dash.dev/">3dash.dev </a>
            .
        </li>
    </ul>
    <h2 id="phpstorm"><span class="ez-toc-section" id="PhpStorm"></span> PhpStorm<span
            class="ez-toc-section-end"></span>
    </h2>
    <ul>
        <li><a href="https://plugins.jetbrains.com/plugin/18813-ddev-integration">DDEV
                통합 – IntelliJ IDE 플러그인</a> –
            PhpStorm용 <a href="https://github.com/drud/ddev">DDEV
            </a> 통합 플러그인의 베타 버전입니다.
        </li>
        <li> Dmitry Khorev <a
                href="https://medium.com/@dkhorev/boost-your-productivity-in-laravel-with-advanced-phpstorm-setup-34a354efbbce">의
                고급 PhpStorm 설정으로 Laravel에서
                생산성을 높이</a> 십시오.
        </li>
        <li>
            Brent Roose <a href="https://stitcher.io/blog/clean-and-minimalistic-phpstorm">의
                깨끗하고 최소한의 PhpStorm</a>
            .
        </li>
    </ul>
    <h2 id="symfony"><span class="ez-toc-section" id="Symfony"></span>
        심포니<span class="ez-toc-section-end"></span>
    </h2>
    <ul>
        <li><a href="https://symfony.com/blog/symfony-6-1-0-released">Symfony
                6.1</a> 이
            출시되었으며 많은 <a href="https://symfony.com/blog/symfony-6-1-curated-new-features">새로운
                기능</a> 이
            포함되어
            있습니다.<br>
            <blockquote class="twitter-tweet">
                <p lang="en" dir="ltr">
                    Symfony
                    6.1은
                    3시간
                    전에
                    출시되었습니다.
                    방금
                    업그레이드
                    PR을
                    병합하여
                    프로덕션에
                    제공했습니다.
                    🚀
                    모든
                    것이
                    원활하게
                    실행됩니다.
                </p>
                <p> 애플리케이션은
                    ±10년이
                    넘었고
                    10k+
                    클래스가
                    있으며
                    현재
                    20k
                    rpm을
                    처리하고
                    있습니다.
                </p>
                <p> 모두
                    즐거운
                    금요일
                    되세요
                    😎
                    <a href="https://t.co/Ce263ESQ6a">https://t.co/Ce263ESQ6a
                    </a>
                    <a href="https://t.co/RKJtEFrFfZ">https://t.co/RKJtEFrFfZ
                    </a>
                    <a href="https://t.co/5SJrmPPtxK">pic.twitter.com/5SJrmPPtxK
                    </a>
                </p>
                <p>
                    —
                    Ruud
                    Kampuis(@Ruud_)
                    <a href="https://twitter.com/Ruud_/status/1530135229444370433?ref_src=twsrc%5Etfw">2022년
                        5월
                        27일</a>
                </p>
            </blockquote>
        </li>
        <li>
            <a href="https://symfony.com/blog/get-certified-on-symfony-6-and-twig-3">Symfony
                6
                및
                Twig
                3
                인증
                받기</a>
            <br>
            이제
            Symfony
            6
            및
            Twig
            3
            온라인
            인증을
            사용할
            수
            있습니다.
            두
            시험
            모두
            처음부터
            재작업되었습니다.
        </li>
        <li><a href="https://symfony.com/blog/a-week-of-symfony-806-6-12-june-2022">A
                Week of
                Symfony
                #806(2022년
                6월
                6-12일)</a>
            .
        </li>
        <li>
            Loïc Vernet
            <a href="https://www.strangebuzz.com/en/blog/initializing-your-symfony-project-with-solid-foundations">의
                견고한 기반으로
                Symfony
                프로젝트를
                초기화합니다</a>
            .
        </li>
        <li><a href="https://tomasvotruba.com/blog/how-to-test-symfony-routes-to-make-huge-refactorings-safe/">거대한
                리팩토링을
                안전하게
                만들기
                위해
                Symfony
                경로를
                테스트하는
                방법</a>
            Tomas
            Votruba.
        </li>
    </ul>
    <h2 id="laravel"><span class="ez-toc-section" id="Laravel"></span>
        라라벨<span class="ez-toc-section-end"></span>
    </h2>
    <ul>
        <li><a href="https://laravel-comments.com/">spatie/laravel-comments-livewire
            </a>
            –
            Spatie의
            새로운
            유료
            Livewire
            패키지로,
            Laravel
            애플리케이션의
            모델과
            주석을
            연결합니다.
        </li>
        <li>
            <a href="https://github.com/laravel/vite-plugin">laravel/vite-plugi
            </a>
            –
            <a href="https://vitejs.dev/">Vite
            </a>
            는
            빠른
            개발
            환경을
            제공하고
            프로덕션용
            코드를
            번들로
            제공하는
            최신
            프론트엔드
            빌드
            도구입니다.
            Laravel은
            이제
            개발
            및
            생산을
            위해
            자산을
            로드하는
            공식
            플러그인
            및
            Blade
            지시문을
            제공하여
            Vite와
            원활하게
            통합됩니다.
        </li>
        <li>
            <a href="https://github.com/hasinhayder/hydra">hasinhayder/hydra
            </a>
            –
            뛰어난
            사용자
            및
            역할
            관리
            API와
            함께
            제공되는
            Laravel
            9x
            +
            Laravel
            Sanctum이
            포함된
            구성이
            없는
            API
            상용구입니다.
        </li>
        <li>
            <a href="https://artisan.page/">Laravel
                Artisan
                Cheatsheet</a>
            –
            Laravel의
            내장
            장인
            명령
            및
            해당
            옵션에
            대한
            온라인
            참조입니다.
        </li>
        <li>
            <a href="https://github.com/codestudiohq/laravel-totem">codestudiohq/laravel-totem
            </a>
            –
            이
            도구를
            사용하면
            잘
            구성된
            대시보드에서
            Laravel
            일정을
            관리할
            수
            있습니다.
        </li>
        <li>
            <a href="https://github.com/worksome/request-factories">worksome/request-factories
            </a>
            –
            모든
            상용구
            없이
            Laravel에서
            요청을
            테스트합니다.
        </li>
        <li>
            Martin
            Joo의
            <a href="https://martinjoo.dev/35-eloquent-recipes">35
                Laravel
                Eloquent
                Recipes</a>
            .
        </li>
        <li>
            <a href="https://laravel-news.com/laravel-route-organization-tips">Laravel
                경로
                그룹화:
                Povilas
                Korop의
                경로
                구성을
                위한
                6가지
                기술</a>
            .
        </li>
        <li>
            Ian
            <a href="https://www.iankumu.com/blog/laravel-dynamic-scheduling/">Kumu의
                Laravel
                Dynamic
                Scheduling
                구현
                방법</a>
            .
        </li>
        <li>
            Povilas
            Korop
            <a href="https://laravel-news.com/controller-refactor">의
                Services,
                Events,
                Jobs,
                Actions
                등을
                사용하여
                Laravel
                컨트롤러를
                재구성합니다</a>
            .
        </li>
    </ul>
    <h2 id="misc"><span class="ez-toc-section" id="Misc"></span>
        <strong>기타</strong><span class="ez-toc-section-end"></span>
    </h2>
    <ul>
        <li> Brent
            Roose
            <a href="https://stitcher.io/blog/php-enum-style-guide">의
                PHP
                열거형
                스타일
                가이드</a>
            .
        </li>
        <li>
            Mark
            Baker
            <a href="https://markbakeruk.net/2022/06/06/list-o-mania/">의
                List-o-mania</a>
            .
            몇
            가지
            영리한
            트릭과
            몇
            가지
            제한
            사항이
            포함된
            PHP의
            <code>list</code>
            구성에
            대한
            기사입니다.
        </li>
        <li> Damien
            Seguy
            <a href="https://www.exakat.io/en/the-very-useful-variadic-argument/">의
                매우
                유용한</a>
            가변적
            논증.
        </li>
        <li>
            Damien
            Seguy의
            <a href="https://www.exakat.io/en/reviewing-property-declaration-in-php/">PHP에서
                속성
                선언
                검토</a>
            .
        </li>
    </ul>
    <h2 id="community"><span class="ez-toc-section" id="Community"></span>
        <strong>지역
            사회</strong><span class="ez-toc-section-end"></span>
    </h2>
    <ul>
        <li><a href="https://getparthenon.com/blog/2022-php-conferences-list/">2022
                PHP
                컨퍼런스
                목록</a>
            .
        </li>
        <li>
            <a href="https://twitter.com/rdohms">Rafael
                Doohms</a>
            <a href="https://www.etsy.com/shop/DeveloperWear">의
                재미있는
                티셔츠를
                확인하세요</a>
            .
            <br><img src="https://blog.jetbrains.com/wp-content/uploads/2022/06/il_1588xN.3968791093_8rig.webp" alt
                     width="300">
        </li>
        <li><a href="https://www.exakat.io/en/where-can-you-get-an-elephpant-php-elephant/">코끼리는
                어디서
                구하나요?</a>
            <ul>
                <li> 하늘색과
                    분홍색:
                    <a href="https://www.elephpant.com/">elephpant.com
                    </a>
                    .
                </li>
                <li>
                    블루
                    <a href="https://www.exakat.io/product/inphpinity/">PHP
                        8
                        inphpinity</a>
                    :
                    <a href="https://www.exakat.io/product/inphpinity/">exakat.io
                    </a>
                    .
                </li>
                <li>
                    흰색,
                    조커
                    및
                    진한
                    파란색:
                    <a href="https://shop.confoo.ca/toys">confoo.ca
                    </a>
                    .
                </li>
                <li>
                    주황색:
                    <a href="https://thelia.net/index.php/thelia-elephpant.html">lia.net
                    </a>
                    .
                </li>
                <li>
                    이탈리아
                    삼색:
                    <a href="https://shop.grusp.org/product/aida-phpday-elephpant/?v=796834e7a283">grusp.org
                    </a>
                    .
                </li>
                <li>
                    주황색
                    php[건축가]:
                    <a href="http://www.phparch.com">phparch.com/swag
                    </a>
                    .
                </li>
                <li>
                    레드
                    라라벨:
                    <a href="https://www.phparch.com/swag/laravel-plush-elephpant/">phparch.com/swag
                    </a>
                    .
                </li>
            </ul>
        </li>
        <li>
            워드프레스에도
            사랑스러운
            마스코트가
            있다는
            것을
            알고
            계셨나요?<br>
            <blockquote class="twitter-tweet">
                <p lang="en" dir="ltr">
                    <a href="https://twitter.com/hashtag/Wapuu?src=hash&amp;ref_src=twsrc%5Etfw">#Wapuu
                    </a>
                    는
                    WordCamp
                    Europe의
                    모든
                    곳에서
                    진행됩니다!
                    당신은
                    그에
                    대해
                    얼마나
                    많은
                    다른
                    사진을
                    얻을
                    수
                    있습니까?
                    <a href="https://t.co/iVD2K7rvx2">https://t.co/iVD2K7rvx2
                    </a>
                    에
                    게시하면
                    모두
                    볼
                    수
                    있습니다!</p>
                <p>
                    📸
                    <a href="https://twitter.com/hashtag/WordPress?src=hash&amp;ref_src=twsrc%5Etfw">#WordPress
                    </a>
                    사진
                    디렉토리
                    <a href="https://t.co/90SvbhINp6">https://t.co/90SvbhINp6
                    </a>
                    에서
                    Nicholas
                    Garofalo의
                    “Wapuu
                    ready
                    to
                    travel
                    to
                    <a href="https://twitter.com/hashtag/WCEU?src=hash&amp;ref_src=twsrc%5Etfw">#WCEU
                    </a>
                    ”
                    <a href="https://t.co/0YfURIAV5X">pic.twitter.com/0YfURIAV5X
                    </a>
                </p>
                <p>
                    —
                    워드프레스(@WordPress)
                    <a href="https://twitter.com/WordPress/status/1532344032327761922?ref_src=twsrc%5Etfw">2022년
                        6월
                        2일</a>
                </p>
            </blockquote>
        </li>
    </ul>
    <p>
        오늘은
        여기까지입니다.
        읽어주셔서
        감사합니다!
    </p>
    <p> PHP
        Annotated를
        통해
        공유할
        흥미롭거나
        유용한
        링크가
        있으면
        이
        게시물에
        댓글을
        남기거나
        저에게
        <a href="https://twitter.com/pronskiy">트윗
        </a>
        을
        보내주십시오.</p>
    <p style="text-align:
                                                                                                                                                                                                                                    left;"
       align="center">
        <a class="jb-download-button"
           title="이
                                                                                                                                                                                                                                        양식을
                                                                                                                                                                                                                                        작성하고
                                                                                                                                                                                                                                        PHP
                                                                                                                                                                                                                                        Annotated
                                                                                                                                                                                                                                        Monthly를
                                                                                                                                                                                                                                        이메일로
                                                                                                                                                                                                                                        새로
                                                                                                                                                                                                                                        받으십시오."
           href="https://info.jetbrains.com/PHP-Annotated-Subscription.html">PHP
            주석
            구독</a>
    </p>
    <p>
        <em>JetBrains
            PhpStorm
            팀</em><br>
        <em>발전을
            위한
            추진력</em>
        <br>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8">
        </script>
    </p>
    <div class="content__row">
        <div class="tag-list">
            <a href="/phpstorm/tag/laravel/" class="tag">Laravel</a>
            <a href="/phpstorm/tag/php/" class="tag">PHP</a>
            <a href="/phpstorm/tag/php-8-2/" class="tag">PHP
                8.2</a>
            <a href="/phpstorm/tag/php-annotated-monthly/" class="tag">PHP
                Annotated
                Monthly</a>
            <a href="/phpstorm/tag/rfc/" class="tag">RFC</a>
            <a href="/phpstorm/tag/symfony/" class="tag">symfony</a>
        </div>
        <ul class="social">
            <li><span>공유하다</span>
            </li>
            <li><a target="_blank"
                   href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fblog.jetbrains.com%2Fphpstorm%2F2022%2F06%2Fphp-annotated-june-2022%2F"
                   rel="noopener
                                                                                                                                                                                                                                            noreferrer"><i
                        class="icon-facebook"></i></a>
            </li>
            <li><a target="_blank"
                   href="https://twitter.com/intent/tweet?source=https%3A%2F%2Fblog.jetbrains.com%2Fphpstorm%2F2022%2F06%2Fphp-annotated-june-2022%2F&amp;text=https%3A%2F%2Fblog.jetbrains.com%2Fphpstorm%2F2022%2F06%2Fphp-annotated-june-2022%2F&amp;via=phpstorm"
                   rel="noopener
                                                                                                                                                                                                                                            noreferrer"><i
                        class="icon-twitter"></i></a>
            </li>
            <li><a target="_blank"
                   href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fblog.jetbrains.com%2Fphpstorm%2F2022%2F06%2Fphp-annotated-june-2022%2F"
                   rel="noopener
                                                                                                                                                                                                                                            noreferrer"><i
                        class="icon-linkedin"></i></a>
            </li>
        </ul>
    </div>
    <div class="content__pagination">
        <a class="content__pagination-prev" href="https://blog.jetbrains.com/phpstorm/2022/06/phpstorm-2022-2-eap-3/">
            <i class="icon-arrow-left"></i>PhpStorm
            2022.2
            EAP
            #3:
            열거형
            만들기</a>
        <a class="content__pagination-next"
           href="https://blog.jetbrains.com/phpstorm/2022/06/phpstorm-2022-1-3-rc/">PhpStorm
            2022.1.3
            RC<i class="icon-arrow-right"></i></a>
    </div>

</div>
<div class="container comments-container">
    <div class="content">
        <div id="remark42"></div>
    </div>
</div>

</body>
</html>
