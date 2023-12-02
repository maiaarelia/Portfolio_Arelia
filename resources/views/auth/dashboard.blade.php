@extends('auth.layouts')

@section('content')
<header class="header">
    <a href="#" class="logo">Portofolio.</a>

    <nav class="navigasi">
        <a href="#" style="--i:1;" class="active">Home</a>
        <a href="#" style="--i:2;">About Me</a>
        <a href="#" style="--i:3;">My Services</a>
        <a href="#" style="--i:4;">Portofolio</a>
        <a href="#" style="--i:5;">Contact Us</a>
    </nav>
</header>

<section class="home">
    <div class="home-content">
        <h3> Hello, It's Me </h3>
        <h1>Arelia Maia Ashary</h1>
        <h3>I'm a <span class="multiple-text">UI/UX Designer</span></h3>
        <p>A Vocational School
            student majoring in Software Engineering
            Technology from the 2022 cohort. I have a strong interest in
            the field of IT, particularly in UI/UX,
            and I have experience participating in a
            six-month coding bootcamp to develop product
            development skills. I am a reliable individual
            who excels both in solo work and team
            collaborations. I am detail-oriented,
            persistent, adaptable, critical thinker.</p>

        <div class="social-media">
            <a href="#" style="--i:7;"><i class='bx bxl-instagram-alt'></i></a>
            <a href="#" style="--i:8;"><i class='bx bxl-linkedin-square'></i></a>
            <a href="#" style="--i:9;"><i class='bx bxl-github'></i></a>
            <a href="#" style="--i:10;"><i class='bx bxl-twitter'></i></a>
        </div>
        <a href="#" class="cv">Download CV</a>
    </div>
    <div class="home-img">
        <img src="img/me.jpeg" alt="" style="border-radius: 15px;">
    </div>
</section>


<!-- about -->
<div id="about">
    <div class="container">
        <div class="row">
            <div class="about-col-1">
                <img src="img/me2.jpeg" alt="">
            </div>
            <div class="about-col-2">
                <h1 class="sub-title">About Me</h1>
                <p>Lorem ipsum dolor sit amet,
                    consectetur adipisicing elit.
                    Quibusdam non quidem temporibus,
                    neque assumenda culpa nihil
                    perferendis nostrum possimus
                    voluptatibus fuga a.
                    Incidunt consequuntur rem alias
                    neque sed. Eaque, quia.</p>

                <div class="tab-titles">
                    <p class="tab-links active-links" onclick="opentab('hobbies')">Hobbies
                    <p class="tab-links" onclick="opentab('skills')">Skills</p>
                    <p class="tab-links" onclick="opentab('achievements')">Achievements</p>
                </div>
                <div class="tab-contents active-tab" id="hobbies">
                    <ul>
                        <li><span style="font-weight: bolder;">Cooking</span><br>
                            <p>Enjoying the art of creating delicious
                                meals and experimenting with
                                different recipes.</p>
                        </li>
                        <li><span style="font-weight: bolder;">Listening To Music</span><br>
                            <p>Finding joy and relaxation
                                by immersing myself in various
                                genres and artists.
                            </p>
                        </li>
                        <li><span style="font-weight: bolder;">Explore Nature</span><br>
                            <p>Connecting with the outdoors,
                                discovering new landscapes, and
                                appreciating the beauty of the natural world.</p>
                        </li>
                    </ul>
                </div>
                <div class="tab-contents" id="skills">
                    <ul>
                        <li><span>UI/UX</span><br>
                            <p>Enjoying the art of creating delicious meals and experimenting with
                                different recipes.</p>
                        </li>
                        <li><span>Front End Developer</span><br>
                            <p>Finding joy and relaxation by immersing myself in
                                various
                                genres and artists.</p>
                        </li>
                        <li><span>Explore Nature</span><br>
                            <p>Connecting with the outdoors, discovering new landscapes, and
                                appreciating the beauty of the natural world.</p>
                        </li>
                    </ul>
                </div>
                <div class="tab-contents" id="achievements">
                    <ul>
                        <li><span>Cooking</span><br>
                            <p>Enjoying the art of creating delicious meals and experimenting with
                                different recipes.</p>
                        </li>
                        <li><span>Listening To Music</span><br>
                            <p>Finding joy and relaxation by immersing myself in various
                                genres and artists.</p>
                        </li>
                        <li><span>Explore Nature</span><br>
                            <p>Connecting with the outdoors, discovering new landscapes, and
                                appreciating the beauty of the natural world.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- service -->
<div id="service">
    <div class="container">
        <div class="sub-title">My Services</div>
        <div class="services-list">
            <div>
                <i class="fa-solid fa-code"></i>
                <h2>Front End</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque nostrum quisquam quas voluptates
                    ullam sapiente fugit sunt qui laudantium quod, voluptatem maxime sed necessitatibus ipsum. Labore
                    odit asperiores sequi voluptatem!</p>
                <a href="">Learn more</a>
            </div>
            <div>
                <i class="fa-solid fa-crop-simple"></i>
                <h2>UI/UX Design</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque nostrum quisquam quas voluptates
                    ullam sapiente fugit sunt qui laudantium quod, voluptatem maxime sed necessitatibus ipsum. Labore
                    odit asperiores sequi voluptatem!</p>
                <a href="">Learn more</a>
            </div>
            <div>
                <i class="fa-brands fa-app-store"></i>
                <h2>App Design</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque nostrum quisquam quas voluptates
                    ullam sapiente fugit sunt qui laudantium quod, voluptatem maxime sed necessitatibus ipsum. Labore
                    odit asperiores sequi voluptatem!</p>
                <a href="">Learn more</a>
            </div>

        </div>
    </div>
</div>


<!-- Portfolio -->
<div id="portfolio">
    <div class="container">
        <div class="sub-title">My Work</div>
        <div class="work-list">
            <div class="work">
                <img src="img/me2.jpeg" alt="">
                <div class="layer">
                    <h3>FARMATE</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, cum.</p>
                    <a href="#"><i class="fa-solid fa-up-right-from-square"></i></a>
                </div>
            </div>
            <div class="work">
                <img src="img/me2.jpeg" alt="">
                <div class="layer">
                    <h3>KOMATIK</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, cum.</p>
                    <a href="#"><i class="fa-solid fa-up-right-from-square"></i></a>
                </div>
            </div>
            <div class="work">
                <img src="img/me2.jpeg" alt="">
                <div class="layer">
                    <h3>MONITORING CHAT</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, cum.</p>
                    <a href="#"><i class="fa-solid fa-up-right-from-square"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{route('users')}}">
    @csrf
    <button>Lihat Users</button>
</form>

</div>


@endsection

<script>

    var tablinks = document.getElementsByClassName("tab-links");
    var tabcontents = document.getElementsByClassName("tab-contents");
    function opentab(tabname) {
        for (tablink of tablinks) {
            tablink.classList.remove("active-links")
        }
        for (tabcontent of tabcontents) {
            tabcontent.classList.remove("active-tab")
        }
        event.currentTarget.classList.add("active-links");
        document.getElementById(tabname).classList.add("active-tab");
    }

</script>