<?php


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="blog.css">
</head>

<body>
    <header>
        <p>issue No.14</p>
        <p>Website Exclusive</p>
        <p>October 7, 2024</p>
    </header>
    <hr class="line">
    <hr class="line">
    <div class="title">
        <a id="home" class="home" href="../Home/home.php">
            <img src="../../assets/home.svg" alt="">
            <span>Home</span>
        </a>
        <h1>K-CHRONICLES: THE ART OF KOREAN FASHION</h1>
        <a id="logout" class="logout" href="../logout.php">
            <img src="../../assets/logout.svg" alt="">
            <span>Logout</span>
        </a>
    </div>
    <hr class="line">
    <?php
    if (isset($_SESSION['admin'])) {
        echo '
                <div id="action">
                    <a id="edit" href="">Edit</a>
                    <a id="delete">Delete</a>
                </div>
            ';
    }
    ?>
    <article id="article">
        <div id="title-flex">
            <span>
                <h2>Seoul Streets: The Pulse of Korean Streetwear</h2>
            </span>
            <span>Published on: December 9, 2024</span>
            <span>Category: Streetwear</span>
            <span>By: Nicole Ashley</span>
            <div id="cl-action">
                <a href="">❤️ <span>1</span></a>
                <a href="">💬 <span>2</span></a>
            </div>
        </div>
        <section>
            <p>Welcome to our space dedicated to the ever-evolving world of Korean streetwear! Here, we dive deep into the latest trends, explore the influence of Korean pop culture, and highlight the unique brands that are making waves globally.</p>
        </section>
        <section>
            <h2>The Rise of Korean Streetwear: More Than Just Fashion</h2>
            <p>Korean streetwear has been on the rise for the past decade, and it’s no longer a niche trend. From the bustling streets of Seoul to international runways, Korean streetwear has left a mark on the global fashion scene. But what makes it stand out? It’s the perfect blend of innovative design, bold aesthetics, and cultural references that make Korean streetwear truly unique.</p>
            <p>This blog will explore everything from current trends to how Korean pop culture influences fashion. Whether you're looking to update your wardrobe, find new brands, or just get inspired, you've come to the right place!</p>
        </section>
        <section>
            <h2>Trending Now: Key Pieces in Korean Streetwear</h2>
            <ul>
                <li><strong>Oversized Hoodies & Sweatshirts</strong>: These pieces are staples in Korean street fashion, often adorned with bold graphics or minimalist text.</li>
                <li><strong>Statement Sneakers</strong>: From chunky dad shoes to sleek modern kicks, sneakers are a core part of the style.</li>
                <li><strong>Layered Clothing</strong>: Mixing different textures and fabrics, especially in monochromatic tones or muted colors, is key to achieving that effortlessly cool look.</li>
                <li><strong>Bold Accessories</strong>: Large caps, chain necklaces, and trendy bags are perfect for adding a personal touch to any outfit.</li>
            </ul>
        </section>
        <section>
            <h2>Brand Spotlight: Ader Error</h2>
            <p>Ader Error is one of the most influential streetwear brands from Korea, known for its playful, deconstructed designs that blur the lines between streetwear and art. The brand’s concept revolves around the idea of "error," creating fashion that challenges traditional norms and celebrates imperfection.</p>
            <p>Whether it’s their oversized pieces, abstract patterns, or unexpected combinations, Ader Error has gained a massive following not just in Korea, but around the world. Stay tuned as we delve deeper into their collections and why they’re at the forefront of Korean streetwear.</p>
        </section>
        <section>
            <h2>How Korean Pop Culture Shapes Streetwear Fashion</h2>
            <p>From K-pop idols to K-drama characters, Korean pop culture has a massive influence on streetwear. Fans closely follow the fashion choices of their favorite stars, who often wear pieces from the latest streetwear collections. This fusion of music, drama, and fashion has made Korean streetwear synonymous with cool, effortlessly stylish looks.</p>
            <p>For instance, BTS and BLACKPINK are known not only for their musical talent but also for their influence on fashion trends. Their wardrobe choices often inspire collections and collaborations with global fashion brands.</p>
        </section>
        <section>
            <h2>Styling Tips: How to Wear Korean Streetwear</h2>
            <p>Looking to incorporate Korean streetwear into your wardrobe? Here’s how to achieve the perfect Korean street style:</p>
            <ol>
                <li><strong>Go for Layering</strong>: Mix oversized tops with skinny jeans or wide-legged pants for that perfect balance.</li>
                <li><strong>Play with Colors</strong>: While muted tones like black, gray, and beige dominate, don't shy away from bold pops of color, like neon greens or vibrant oranges.</li>
                <li><strong>Mix High and Low Fashion</strong>: Combine high-end brands with more affordable street labels for a balanced, stylish look.</li>
                <li><strong>Accessorize Boldly</strong>: Statement hats, chains, and unique footwear can transform even the simplest outfit into something special.</li>
            </ol>
        </section>
        <section>
            <h2>Where to Shop Korean Streetwear</h2>
            <p>Looking to add some Korean streetwear to your wardrobe? Here are some online stores and physical locations to check out:</p>
            <ul>
                <li><strong>Kooding</strong>: A global e-commerce site that offers a wide range of Korean streetwear brands.</li>
                <li><strong>The Seoul Store</strong>: A popular site for international fans of Korean fashion.</li>
                <li><strong>WOOYOUNGMI</strong>: Known for its sleek, high-fashion takes on Korean streetwear.</li>
                <li><strong>SSG.COM</strong>: One of Korea’s biggest online stores offering a mix of high-end and street brands.</li>
            </ul>
        </section>
        <section>
            <h2>Final Thoughts: The Future of Korean Streetwear</h2>
            <p>Korean streetwear isn’t just a passing trend – it’s a movement. As streetwear continues to evolve, expect more bold designs, fresh collaborations, and cultural influences to shape the landscape. Whether you're a long-time fan or just starting to explore the scene, there’s always something new and exciting happening in the world of Korean fashion.</p>
            <p>Stay tuned for more updates, trends, and insights as we continue to explore and celebrate the creativity of Korean streetwear!</p>
        </section>
    </article>

    <div class="comment-form-container">
        <form class="comment-form">
            <input type="text" id="comment" name="comment" placeholder="Write your comment here..." required>
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>

    <div class="comments-section">
        <h3>User Comments:</h3>

        <!-- Example comment divs -->
        <div class="comment">
            <div class="comment-header">
                <p class="comment-author">John Doe</p>
                <p class="comment-date">Posted on: December 9, 2024</p>
            </div>
            <p class="comment-text">This is a great post! I really enjoyed reading it.</p>
        </div>

        <div class="comment">
            <div class="comment-header">
                <p class="comment-author">Jane Smith</p>
                <p class="comment-date">Posted on: December 8, 2024</p>
            </div>
            <p class="comment-text">I found this very helpful. Thanks for sharing!</p>
        </div>
    </div>


</body>

</html>