<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="" />
    <meta name="description" content="{{$seo->description}}" />
    <meta name="keywords" content="{{$seo->keywords}}" />
    <meta name="Resource-type" content="Document" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=nо">
    <title>{{$seo->title}}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dragndrop.css') }}" />
    <link rel="stylesheet" href="{{asset('css/hints.css')}}">
</head>

<body>
<div class="wrapper">
    @include('main-menu')
    <div class="content-registration-artist">
        <div class="content-inner">
            <div class="section">
                <div class="left_box">
                    <div class="title">Sell Your Art</div>
                    <div class="left-description">
                        <p> Welcome to the Canvas Print Studio Artist Gallery, a free online platform for artists to sell their work.
                            Have your artwork publicised to a wider audience of industry professionals, online shoppers and art
                            collectors. </p>
                        <br>
                        <p> Sell your work without the hassle of sourcing reputable printers, framers, couriers and having to offer
                            customer support. We coordinate everything for you, so you can keep the creativity flowing. </p>
                        <p class="uppercase">YOUR ART BELONGS TO YOU</p>
                        <p>Most importantly, your work always belongs to you. No matter how many images you upload and
                            sell, you retain ownership and control of your work.</p>
                        <a href="#" class="sell_art">How it works</a>
                        <a href="#" class="user_agreement" style="margin-top:10px">User Agreement</a>
                        <a href="#" class="faq_modal">FAQ</a>
                    </div>
                </div>
                <div class="right_box">
                    <div class="reg_right_title">Apply Now</div>
                    <form role="form" method="post" action="{{ url('my-account/registration') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="label">
                            <label for="name">Your name</label>
                            <label for="mail">Email</label>
                            <label for="pass">Password</label>
                            <label for="confirm_pass">Confirm Password</label>
                            <label for="phone">Phone</label>
                            <label for="work">Style of work</label>
                            <label for="examples">Examples of work ​<span>(e.g.​ ​Link​ ​to​ ​website,​ ​Instagram,Tumblr)</span></label>
                        </div>
                        <div class="input">
                            <input type="text" id="name" name="name" required>
                            <input type="email" id="mail" name="email" required>
                            <input type="password" id="pass" name="password" required>
                            <input type="password" id="confirm_pass" name="password_confirm" required>
                            <input type="tel" id="phone" name="phone" required>
                            <input type="text" id="work" name="style_work" required>
                            <input type="text" id="examples" name="example" required>
                        </div>
                        <div class="checkbox_group">
                            <div class="checkbox_item">
                                <input type="checkbox" id="c1" name="sell_originals" />
                                <label for="c1"> <span></span> Are you interested in selling ​originals​? <a href="">Pricings</a> </label>
                            </div>
                            <div class="checkbox_item">
                                <input type="checkbox" id="c2" name="ready_to_print" />
                                <label for="c2"> <span></span> Is your work ready to print? </label>
                            </div>
                        </div>
                        <input type="hidden" name="bio" value="">
                    <!--			drug and drop				-->
                        <div class="drag-n-drop">
                            <div class="left" id="html-uploaded-files">


                            </div>
                            <div class="drop-text">
                                <div class="text"> <a class="fake-btn">Upload</a> ​or​ ​drag​ ​and​ ​drop​ ​a​ ​sample​ ​of​ ​your​ ​artwork​ ​(only​ ​required​ ​if​ ​no​ ​links​ ​have​ ​been

                                    provided​ ​above) </div>
                                <div class="text"> You can also <a id="drop-button" class="dropbox">Link</a> your works.
                                </div>
                                <div class="format">jpg, tiff, png, psd, ai, eps are accepted file types</div>
                            </div>
                            <input type="hidden" id="files_dropbox" name="files_dropbox">
                            <input class="file-input"  id="upload" type="file" name="photo">
                        </div>
                    <!--			drug and drop - end				-->
                        <p>By submitting this application you acknowledge that you have read and agree to our <a href="#" class="user_agreement">User Agreement</a></p>
                        <a href="#" class="sell_art">Sell your Art</a>
                        <input type="submit" value="SUBMIT" class="submit">
                    </form>
                </div>
            </div>
            <div class="section section2">
                <h1>How It Works</h1>
                <p class="description">Canvas​ ​Print​ ​Studio​ ​lets​ ​you​ ​decide​ ​what​ ​price​ ​you​ ​sell​ ​your​ ​artwork​ ​for.​ ​Our​ ​online​ ​gallery​ ​is
                    structured​ ​so​ ​that​ ​there​ ​are​ ​no​ ​fees,​ ​commission​ ​or​ ​sign-up​ ​costs.​ ​We​ ​offer​ ​a​ ​discounted
                    production​ ​rate​ ​to​ ​all​ ​artists,​ ​just​ ​add​ ​your​ ​margin​ ​to​ ​each​ ​print​ ​to​ ​decide​ ​the​ ​final​ ​sale​ ​price.</p>
                <div class="box_container box_container1">
                    <div class="box">
                        <img src="{{asset('img/settings/settings.png')}}" alt="">
                        <div class="title">Production Cost</div>
                    </div>
                    <div class="box">
                        <img src="{{asset('img/settings/+.png')}}" alt="">
                    </div>
                    <div class="box">
                        <img src="{{asset('img/settings/calculator-2.png')}}" alt="">
                        <div class="title">Your Margin</div>
                    </div>
                    <div class="box">
                        <img src="{{asset('img/settings/=.png')}}" alt="">
                    </div>
                    <div class="box">
                        <img src="{{asset('img/settings/money.png')}}" alt="">
                        <div class="title">Sale Price</div>
                    </div>
                </div>

                <a class="pricing" href="">Pricing Explained</a>
                <div class="box_container">
                    <div class="box">
                        <div class="title">Create, Upload and Review</div>
                        <p>Once accepted, we ensure your work is print ready. If required, we can help you get your work into digital format.</p>
                    </div>
                    <div class="box">
                        <div class="title">Transactions and Payments</div>
                        <p>We handle all customer transactions and provide an easy and quick method for receiving payment.</p>
                    </div>
                    <div class="box">
                        <div class="title">Printing Your Work</div>
                        <p>While you’re creating something new, our team will take care of the entire printing process from start to finish.</p>
                    </div>
                    <div class="box">
                        <div class="title">Delivery or Pick Up</div>
                        <p>We offer nationwide delivery from a trusted courier or the option to collect from our studio.</p>
                    </div>
                    <div class="box">
                        <div class="title">Customer Care</div>
                        <p>We provide second to none customer service. Our mission is to ensure customers are completely satisfied with their purchase.</p>
                    </div>
                </div>
                <a class="apply" href="">Apply now</a>
            </div>
        </div>
    </div>
</div>

<div class="hint_wrapper artworks_overview" style="display:none;">
    <div class="hint_background"></div>
    <div class="hint_outside">
        <button class="hint_close"></button>
        <div class="hint_body_out">
            <div class="hint_body">
                <p class="title">FAQ for Customers</p>
                <p class="title title2">ABOUT US</p>
                <p>What is Canvas Print Studio?<br>
                    Canvas Print Studio is a one stop shop for canvas printing and framing. We are 100% Australian made and owned and we pride ourselves on producing superior quality prints that are made to last a lifetime.
                </p><br>
                <p>Why buy from us?<br>
                    We only print to canvas, and we take pride in doing this exceptionally well. At Canvas Print Studio you can print images confidently, knowing you have an expert who will review your files and guarantee that you receive a canvas print you will be excited to hang on your wall.
                </p><br>
                <p>We are not a canvas factory, nor do we produce hundreds of genetic canvas prints and have them shipped to Australia. We do things the old fashioned way, with attention to detail and care. We make everything by hand in our Melbourne print studio and source all materials ethically and sustainably within Australia.
                </p><br>
                <p>Why do our prints cost more than Kmart, Officeworks and the Canvas Factory?<br>
                    Our services cater to anyone looking for a premium product that is made ethically within Australia using sustainably sourced materials. We have a passion for producing beautiful quality prints and our experienced team of photographers and artists will print, stretch and frame your canvas on site in our Melbourne print studio.
                </p><br>
                <p>At no additional cost, we can edit, retouch and digitally enhance your image to ensure your file meets the premium standard that you’d expect. We offer a selection of standard sizes in photo, square and panoramic dimensions and also make custom sizes.</p>
                <p class="title title2">PRODUCT INFORMATION</p>
                <p>What type of canvas do you print on?<br>
                    We use Cason 380gsm poly-cotton matte canvas. This is a premium, archival canvas that stretches without cracking and is designed to remain taut over time.
                </p><br>
                <p>What type of ink is used? <br>
                    We print with Canon and only use genuine Canon inks. Our colour profiles are customised to ensure colour accuracy when printing.
                </p><br>
                <p>Are prints UV protected and what does the finish look like?<br>
                    Each canvas is coated with Aquathane-UV liquid laminate to ensure prints are fade-resistant, durable and easy to clean. We use a matte / satin blend to give your print a solid protection without being flat and dull (matte) or overly shiny and reflective (glossy).
                </p><br>
                <p>After many years of experience, we have been able to achieve the perfect blend to make your canvas print stand out from the rest.
                </p><br>
                <p>Is it essential to spray prints with a protective coating? <br>
                    Yes. this is an essential part of the process. Unless you are an artist and have plans to coat your canvas differently, this is a vital process to protect the canvas.
                </p><br>
                <p>What type of wood is used for the stretcher bars?<br>
                    All stretcher bars are kiln-dried and made from sustainable Australian regrowth timber. We custom make all frames in our print studio using stretcher bars that are specifically designed for inkjet canvas printing.
                </p><br>
                <p>What type of timber is used for the frames?<br>
                    We offer Victorian Ash timber floating frames in slim, medium and wide depths. Our range includes raw timber, white and black stain. Raw timber frames are coated with a beeswax finish and we use Porter’s original paints to hand paint our frames. We also offer a darker Blackwood timber on request.
                </p><br>
                <p>How do you finish the edges of the canvas?<br>
                    Our prefered method for the edges is a <a href="{{url('my-account')}}">pixel stretch</a>. In most cases, we find this to be the best option for covering the sides of your print. This avoids part of your mage being wrapped and lost around the sides. If you prefer a mirrored edge, solid colour or plain white, please let us know when ordering. </p><br>
                <p>If you would like your image to wrap around this sides, please allow 35mm for prints A2 size or smaller. All prints larger than A2 size please allow 38mm for each edge. For example: 38mm top + 38mm bottom + 38mm left + 38mm right.</p><br>
                <p>How do you manage colour when printing?<br>
                    We regularly collaborate our computer screen and have colour profiles specifically made for our printers. These colour management measures ensure we print true to the original subject and that we are able to make any necessary image adjustments prior to printing.
                </p><br>
                <p>How is the artwork packaged?<br>
                    To protect the edges of your print we use a clear cling wrap and then neatly wrap in kraft paper. All larger canvas prints are fitted with cardboard corners for extra corner protection. We also offer free gift wrapping on any size print and place inside a protective cardboard box for delivery.
                </p>
                <p class="title title2">DELIVERY AND TURNAROUND</p>
                <p>What are your turnaround times?<br>
                    Our standard turnaround is 5 - 7 days from receiving your order. If you require your print sooner, we may be able to offer you a shorter turnaround so don’t hesitate to ask. Delivery time needs to be added and this can vary from overnight to 3 days within Australia. For Commercial Printing turnaround times, please enquire directly via our <a href="{{url('/#5thPage')}}">contact</a> page or by calling <a href="tel:+61401803186">+61401803186</a>.
                </p><br>
                <p>What happens if I receive my print and I am not completely satisfied?<br>
                    If you receive your print and you are not entirely happy with the outcome, we will gladly reprint it to your satisfaction. If you are still not satisfied, we will cancel your order and refund you. In order to complete this request, we ask for all canvases to be returned to us.
                </p><br>
                <p>Do you ship Australia-wide and Internationally? <br>
                    We courier prints Australia-wide and overseas. We offer free delivery to anywhere in Australia on a standard service. For express deliveries, we have a same-day courier service to Melbourne metro areas and next day express delivery to most suburbs and capital cities.
                </p><br>
                <p>Is delivery included in the price?<br>
                    Yes, we offer free shipping. Our standard delivery time is 5-7 working days and delivery to anywhere in Australia is included in our price.
                </p><br>
                <p>Do you offer faster turnaround times?<br>
                    Yes, we offer faster turnaround on delivery or you can collect directly from our studio located in <a href="{{url('/#5thPage')}}">Brunswick East, Melbourne</a>. Our courier costs are highly competitive and if you would like a quote for faster turnaround please contact us directly. </p>
                <p class="title title2">ORDERING AND PAYMENT</p>
                <p>How do I get my images to you?<br>
                    Digital images can be uploaded via our website using our <a href="{{url('orders/step-1')}}">ordering system</a> or the <a href="{{url('/#5thPage')}}">contact</a> page. You can email us directly with your file or request we send you a Dropbox link (this applies to larger files that can’t be emailed).
                </p><br>
                <p>A Dropbox link can also be shared directly to our email <a href="mailto:print@canvasprintstudio.com.au">print@canvasprintstudio.com.au</a>. This is a fast and easy way to order if you need multiple images printed and have large files. Alternatively, you can use a free file transfer services like <a href="http://yousendit.com">yousendit.com</a>.</p><br>
                <p>Need scanning? If you have an image A4 size or smaller, we can scan it at our studio. If you need a negative or slide scanned we recommend <a href="http://www.michaels.com/tech-%2B-diy/cameras/845840193">Michael’s Camera</a> and to scan larger images or posters we recommend <a href="http://www.cpldigital.com.au/">CPL Digital</a>. If you don’t mind paying the courier expense (approximately $35), we can organise the scanning for you from these companies. If you would like us to purchase any images for you through an online stock photography site, please send us a link to the image.
                </p><br>
                <p>What resolution do I need for my print?<br>
                    There are so many variables, so we can’t give you a clear answer to this question. We welcome you to send your images to us for an obligation-free quality review. We will let you know the largest size we can print your image and offer you a range of sizes and prices to choose from.
                </p><br>
                <p>What are the benefits for printing on canvas?<br>
                    Printing on canvas has many advantages for image resolution, especially if you are looking for a large size print. Canvas offers the ability to create sharper prints from images much lower in resolution than paper would produce. We also have image blow up software that enables you to enlarge your images, so you can get your desired size.
                </p><br>
                <p>What sizes can I order? <br>
                    Our maximum size is 1.36metres x 2.9metres. We custom make our frames, so you can choose any size within the above range.
                </p><br>
                <p>When do I pay and what payment methods do you accept?<br>
                    If you are ordering artwork from our gallery or printing a standard size, you can pay using credit card online. We use Braintree for secure online transactions. For custom orders, we email you an invoice to pay via EFT (bank transfer) or credit card. We also accept payment on pickup or via Paypal.
                </p><br>
                <p>Are there any hidden fees or charges?<br>
                    The prices you see on our website are all-inclusive (including free delivery). We do not charge for image enhancements or basic retouching, this is part of the service we offer with every canvas print.
                </p><br>
                <p>Can we visit the studio to see examples of work?<br>
                    Yes, you are welcome to visit our studio to discuss your ideas for printing on canvas (by appointment only). We are located at Mycelium Studios, <a href="">1/ 10-12 Moreland Rd Brunswick East</a>. Come say hi!
                </p><br>
                <p>Do your prices include GST?<br>
                    GST is included in all <a href="">prices and sizes</a> on our webiste.
                </p>
                <p class="title title2">BUSINESS PRACTISES AND SUSTAINABILITY</p>
                <p>What happens to my files after printing?<br>
                    We store images for up to six months on our private and secure network. We respect that these images are your private property and we do not share or print images without your permission.
                </p><br>
                <p>What is your stance on sustainability?<br>
                    In a world where many products available to us are not designed to last, we take the quality over quantity approach. Making products off shore from cheaper and unsustainable materials, is not our game.
                </p><br>
                <p>We believe that buying and manufacturing locally is one of the fundamental ways to limit our impact on the environment. When you purchase from us, you can be 100% confident that your product has been made in Australia, and done with consideration for the planet.</p><br>
                <p>Sustainable business practice doesn’t end with manufacturing, it includes taking responsibility for the entire lifespan of your product. For this reason, we make our products to last so you’ll be enjoying your purchase for decades to come.
                </p><br>
                <p>Where do printer cartridges end up?<br>
                    We work alongside <a href="http://www.closetheloop.com.au/">Close the Loop</a> to recycle all printer cartridges and utilise any excess ink. Cartridges are upcycled and made into park seating and stationery products such as rulers and the ink is used for ball point pens.
                </p><br>
                <p>Where does manufacturing waste end up?<br>
                    Running any business usually means producing more waste than your average person. With this in mind, we’ve set out to find solutions and ways to eliminate our manufacturing waste and environmental footprint.
                </p><br>
                <p>We have teamed up with Exchange Guardian Early Learning Centre who kindly collect all our canvas and timber offcuts and repurpose them for children’s educational and creative programs.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="hint_wrapper artworks_overview" id="user_agreement" style="display:none;">
    <div class="hint_background"></div>
    <div class="hint_outside">
        <button class="hint_close"></button>
        <div class="hint_body_out">
            <div class="hint_body">
                <p class="title">User Agreement</p>
                <p class="title title2">Introduction</p>

                <p>Canvas Print Studio’s mission is to encourage and support a creative community and we endeavor to provide products, services and advice of the highest standard.
                    For this artist gallery to be available online it is essential that all creatives represented respect the intellectual property rights of others, including copyright and trademarks. All content that is uploaded for sale through the online gallery must have been created by yourself and have permission to use and authorize others to use. We ask all customers and visitors to please respect the copyright and trademarks of all the works you view or purchase at Canvas Print Studio. We take creatives intellectual property very seriously at CPS and protecting it is vital in the future of our growing and sustaining a creative community.
                </p><br>

                <p>It is the sole responsibility of the user uploading and displaying their work on Canvas Print Studio Gallery to ensure they are not breaking any laws reproducing works for print or display. Please take note that having works available attracts legal responsibilities.</p><br>

                <p>It is important you read the agreement below. Using this website means you accept this agreement. If you do not agree with its terms, do not use this website.
                </p>

                <p class="title title2">Legal Agreement</p>

                <p>All visitors (“user”, “you”, “your”) to the Canvas Print Studio website at <a href="http://canvasprintstudio.com.au/">www.canvasprintstudio.com.au</a> (“the website”) are entering a binding legal agreement on the following terms (the “agreement”) when using the website. The agreement is between the user and Canvas Print Studio <a href="tel:36 687 631 327">36 687 631 327</a> ( “CPS”, “we”, “us”, “our” also refer to “Canvas Print Studio” as the context requires)  and use of this website indicates continued acceptance of this agreement.
                </p>

                <p class="title title2">Our service</p>

                <p>Canvas Print Studio provides a range of services which, amongst other things, enable approved users to publish, sell, discuss and purchase art. Users will receive the benefits of CPS’s facilitation of product fulfilment, including payment processing, customer services, product manufacturing, and shipping.
                </p><br>

                <p>The digital content on the website (“content”) may be information, text, data, graphics, images, photographs, sound, video, music or any other material posted online by users. Any content that you upload into the portfolio section of your account is described as your “art”. Your art may be viewed by all users of the website once you elect to publish it. You may order a physical product based on your own art or you may offer your art for sale. If you or a customer decide to place an order, then CPS will produce the print from your instructions and ship the product through a 3rd party courier or shipping company.
                </p>

                <p class="title title2">Members</p>

                <p>You can become a registered member (“member”) of the website’s gallery by setting up a password protected account upon approval of application. You will be required to select a username and password when registering to become a member. You must become a member before any content will appear on the website. In its sole discretion, CPS may refuse any user name that it decides is inappropriate and / or refuse any person from becoming a member.
                </p><br>

                <p>Any information you choose to publish in the public section of your profile may be viewed, distributed or linked to within the website or in the course of delivering the CPS service.
                </p>

                <p class="title title2">Passwords</p>

                <p>You are responsible for actions made on the website using your password, including any products purchased or sold and any content displayed or messages sent, even if these actions were not approved or contemplated by you. You are solely responsible for any loss caused by any use of your password by you, or any other person.
                </p><br>

                <p>You agree that you will not disclose your password to any other person and you will not keep your password where it can be copied or used by anyone other than you. If you suspect someone else knows your password, you must change it immediately.
                </p>

                <p class="title title2">Putting works on the Canvas Print Studio site</p>

                <p>You keep the copyright in any content you submit or upload to the website. In order to receive the CPS services you grant CPS a non-exclusive royalty free license to use and archive the content in accordance with or as reasonably contemplated by this agreement.
                </p><br>

                <p>When you submit or upload content on the website you represent and warrant that:</p><br>

                <ul>
                    <li>you own all copyright in the content, or if you are not the owner, that you have permission to use the content, and that you have all of the rights required to display, reproduce and sell the content;
                    </li>
                    <li>the content you upload will not infringe the intellectual property rights or other rights of any person or entity, including copyright, moral rights, trademark, patent or rights of privacy or publicity;</li>
                    <li>your use of the website will comply with all applicable law, rules and regulations;
                    </li>
                    <li>the content does not contain material that defames or vilifies any person, people, races, religion or religious group and is not obscene, pornographic, indecent, harassing, threatening, harmful, invasive of privacy or publicity rights, abusive, inflammatory or otherwise objectionable;</li>
                    <li>the content does not include malicious code, including but not limited to viruses, trojan horses, worms, time bombs, cancelbots, or any other computer programming routines that may damage, interfere with, surreptitiously intercept, or expropriate any system, program, data, or personal information; and</li>

                    <li>the content is not misleading and deceptive and does not offer or disseminate fraudulent goods, services, schemes, or promotions.</li>
                </ul><br>

                <p>CPS reserves the right to review and if in its sole discretion deemed necessary, remove any content from the website and / or cancel your account, because that content breaches your agreement with us and / or any applicable laws, or otherwise. You agree to indemnify CPS in respect of any direct or indirect damage caused due to your breach of one or more of these warranties.
                </p>

                <p class="title title2">Offering your works / art for sale</p>

                <p>Any accepted member may offer their art for sale on the website by appointing CPS to facilitate the transaction on the terms set out in the Services Agreement in Appendix A. By agreeing to the terms of this user agreement you expressly agree to the terms of the Services Agreement in Appendix A, which will apply from the date on which you offer your first art for sale and your continued use of the website will constitute ongoing agreement to the terms there in as updated from time to time. </p>

                <p class="title title2">Purchasing a Product on CPS</p>

                <p>Users can purchase products on the CPS website payment system.</p> <br>
                <p>You do not have to be a member to purchase a product.</p> <br>
                <p>The price you pay is fixed at the time of ordering.</p> <br>
                <p>You may not cancel an order once it has been submitted.</p> <br>
                <p>It is the customer’s responsibility to ensure the product delivery address is correct. CPS takes no responsibility for any product a customer does not receive because of errors in the delivery address given to us.
                </p>

                <p class="title title2">Paying you after your art is sold</p>

                <p>Payment terms are explained in the our service agreement.</p>

                <p class="title title2">You Instruct CPS to cancel incorrect orders</p>

                <p>You acknowledge that despite our reasonable precautions, products may be listed at an incorrect price or with incorrect information or may be unavailable. This may be due to an error or similar oversight. You acknowledge that we cannot facilitate an order where such an error exists and hereby instruct us to cancel such an order and take other action as required.
                </p><br>

                <p>We may also have to cancel an order if we believe that it is being made in contravention of this agreement, or in contravention of the rights of any person or any law. We may cancel an order even if it has been confirmed and the customer’s credit card or PayPal account has been charged. We reserve this right up until the time of delivery of the product to that customer. If a cancellation of this nature occurs after the customer has been charged for the product, we will credit the customer’s credit card or PayPal account for the amount in question.</p>

                <p class="title title2">Delivery</p>

                <p>Delivery will be facilitated pursuant to your instructions by postal or courier service and will be paid for by the customer at the price indicated at the time of purchase. CPS will charge shipping charges which will vary depending upon the size and price of the product.
                </p>

                <p class="title title2">Damaged Goods</p>

                <p>If a product is delivered to a customer physically damaged in some way (for example, a framed print has cracked. CPS will happily issue a replacement copy of the product after receiving reasonable proof of that damage.
                </p><br>

                <p>If you receive a damaged product, then you must email CPS customer service within 14 days of receipt to tell us about the nature of the damage and to arrange for a new product to be sent to you at no cost to you.</p><br>

                <p>Please be aware that publishing to the website is creator-controlled and we do not screen all of the content on our website. It is the customer’s responsibility to verify the quality of the content (including but not limited to misspelled words, grammatical errors, formatting, design or overall appearance) before ordering a product. This damaged goods policy does not apply to content, only to the physical product.</p>

                <p class="title title2">Excess Inventory</p>

                <p>You grant CPS permission to dispose of any inventory that becomes excess as a result of refund, reprint, fraud, product sampling or promotional activities, in any manner we see fit.
                </p>

                <p class="title title2">Reporting inappropriate content to CPS</p>

                <p>CPS does not manually screen content before it is displayed on the website so occasionally members may inadvertently or deliberately submit and display content that breaches this agreement.
                </p><br>

                <p>Inappropriate content includes, but is not limited to, content that infringes the copyright or other intellectual property rights of any person or company, or that defames or vilifies any person, people, races, religion or religious group, is obscene, pornographic, indecent, harassing, threatening, harmful, invasive of privacy or publicity rights, abusive, inflammatory or otherwise objectionable. CPS reserves the right (but not the obligation) to remove or edit such content, but does not regularly review posted content.</p><br>

                <p>Please help us by letting us know straight away about any inappropriate, or potentially inappropriate, content you see on the website. If you believe your copyright or other intellectual property rights are being infringed, you are able to make a formal complaint via email.</p>

                <p class="title title2">Specific warnings</p>

                <p>You must ensure that your access to this website and the CPS service is not illegal or prohibited by laws that apply to you.
                </p><br>

                <p>You must take your own precautions to ensure that the process that you employ for accessing this website and the CPS service does not expose you to the risk of viruses, malicious computer code or other forms of interference which may damage own computer system. We do not accept responsibility for any interference or damage to any computer system that arises in connection with your use of this website or any linked website.</p><br>

                <p>We do not accept liability for any losses arising directly or indirectly from a failure to provide the CPS service, corruption to or loss of data, errors or interruptions, any suspension or discontinuance of the CPS service, or any transmissions by others in contravention of the registered members’ obligations as set out in this agreement.</p><br>

                <p>You acknowledge that we may not be able to confirm the identity of other registered members or prevent them acting under false pretences or in a manner that infringes the rights of any person.</p>

                <p class="title title2">Intellectual Property Rights and license</p>

                <p>By submitting listings / works to CPS, you grant CPS a non-exclusive, worldwide, royalty-free, sub licenseable and transferable license to use, reproduce, distribute, prepare derivative works of and display the content of such listings in connection with CPS (and its successors' and affiliates') services and business, including without limitation for promoting and redistributing part or all of the CPS site (and derivative works thereof) in any media formats and through any media channels. You also hereby grant each user of the CPS site a non-exclusive license to access your content through the site, and to use, reproduce, distribute, and display such content as permitted through the functionality of the site and under this User Agreement. The above licenses terminate within a commercially reasonable time after you remove or delete your listings from the CPS site. The above licenses granted by you in user comments you submit, are perpetual and irrevocable.
                </p><br>

                <p>All intellectual property rights in this website and the CPS service (including the software and systems underlying the CPS service, and text, graphics, logos, icons, sound recordings and software) are owned by or licensed to us. Other than for the purposes of, and subject to the conditions prescribed under relevant Copyright and Trademark legislation throughout the world, and except as expressly authorized by this agreement, you may not in any form or by any means:</p><br>

                <ul>
                    <li>use, adapt, reproduce, store, distribute, print, display, perform, publish or create derivative works from any part of this website; or</li>
                    <li>commercialize any information, products or services obtained from any part of this website,</li>
                </ul>
                <br>

                <p>without our written permission.</p><br>

                <p>If you use any of our trademarks in reference to our activities, products or services, you must include a statement attributing that trademark to us. You must not use any of our trademarks in or as the whole or part of your own trademarks; in connection with activities, products or services which are not ours; in a manner which may be confusing, misleading or deceptive; or in a manner that disparages us or our information, products or services (including this website).</p> <br>

                <p>This website may contain links to other websites (“linked websites”). Those links are provided for convenience only and may not remain current or be maintained.
                    We are not responsible for the content or privacy practices associated with linked websites.
                </p> <br>

                <p>Our links with linked websites should not be construed as an endorsement, approval or recommendation by us of the owners or operators of those linked websites, or of any information, graphics, materials, products or services referred to or contained on those linked websites, unless and to the extent stipulated to the contrary.</p>

                <p class="title title2">Disclaimer</p>

                <p>We do not represent or guarantee that the CPS service or this website, or any other website that is accessible using a hyperlink from this website will be free from errors or viruses. We do not represent or guarantee that access to the CPS service or these websites will be uninterrupted.
                </p><br>

                <p>You acknowledge that the CPS service or this website may be affected by outages, faults or delays. Such outages, faults or delays may be caused by factors, including technical difficulties with the performance or operation of our or another person’s software, equipment or systems, traffic or technical difficulties with the Internet or infrastructure failures.</p><br>

                <p>We do not warrant that any members’ uploads to this website will be protected against loss, or misuse or alteration by third parties. We do not warrant that all uploaded content will be available on our website. If we elect in our sole discretion to make available content on our website, we do not warrant that it will be available within a certain time frame.</p><br>

                <p>We do not accept responsibility for any loss or damage, however caused (including through negligence), that you may directly or indirectly suffer in connection with your use of this website or any linked website, nor do we accept any responsibility for any such loss arising out of your use of or reliance on information contained on or accessed through this website.</p><br>

                <p>To the extent permitted by law, any condition or warranty that would otherwise be implied into these terms and conditions is hereby excluded. Where legislation implies any condition or warranty, and that legislation prohibits us from excluding or modifying the application of, or our liability under, any such condition or warranty, that condition or warranty will be deemed included but our liability will be limited for a breach of that condition or warranty to one or more of the following:</p><br>

                <p>1. if the breach relates to goods:</p> <br>

                <ul>
                    <li>the replacement of the goods or the supply of equivalent goods;</li>
                    <li>the repair of such goods;</li>
                    <li>the payment of the cost of replacing the goods or of acquiring equivalent goods; or</li>
                    <li>the payment of the cost of having the goods repaired. and</li>
                </ul>
                <br>

                <p>2. if the breach relates to services:</p> <br>

                <ul>
                    <li>the supplying of the services again; or</li>
                    <li>the payment of the cost of having the services supplied again.</li>
                </ul>
                <br>

                <p>This disclaimer set out in these terms and conditions does not attempt or purport to exclude liability arising under statute if, and to the extent, such liability cannot be lawfully excluded.</p>

                <p class="title title2">Indemnity</p>

                <p>You agree to indemnify, defend and hold us, our officers, directors, employees, agents and representatives harmless, as well as, all third parties printing, manufacturing and/or otherwise fulfilling the products you are selling via the website, their officers, directors, employees, agents and representatives harmless, from and against any and all claims, damages, losses, liabilities, costs (including reasonable legal fees) or other expenses that arise directly or indirectly out of or from:
                </p> <br>

                <ul>
                    <li>your breach of any clause of this agreement;</li>
                    <li>any allegation that any materials that you submit to us or transmit to the website infringe or otherwise violate the copyright, trademark, trade secret or other intellectual property or other rights of any third party; and/or</li>
                    <li>your activities in connection with the website.</li>
                </ul>
                <br>

                <p>This indemnity will be applicable without regard to the negligence of any party, including any indemnified person.</p>

                <p class="title title2">Privacy policy</p>

                <p>Your privacy is very important to us. Users of our website should refer to our privacy policy – which is incorporated into this agreement by reference, for information about how we collect and use personal information.
                </p>

                <p class="title title2">Security of information</p>

                <p>No data transmission over the Internet can be guaranteed as totally secure. We strive to protect such information, however we do not warrant and cannot ensure the security of any information that you transmit to us. Accordingly, any information that you transmit to us is transmitted at your own risk.
                </p>

                <p class="title title2">Termination of access</p>

                <p>Access to this website may be terminated at any time by us without notice. Our disclaimer will nevertheless survive any such termination.
                </p>

                <p class="title title2">Dispute Resolution</p>

                <p>This User Agreement and all disputes relating to this User Agreement, or relating to your use of any part of the CPS service, will be exclusively resolved under confidential binding arbitration held in Melbourne, Australia. All disputes will be resolved in accordance with the Rules of JAMS, applying Australian law, without regard to conflicts of law principles.</p><br>

                <p>You and CPS agree to submit to the personal and exclusive jurisdiction of the Federal and State courts in Melbourne County for purposes of enforcing any arbitration award. Notwithstanding the foregoing, CPS may seek injunctive or other equitable relief, from a court of competent jurisdiction. You and CPS agree that any dispute resolution proceedings will be conducted only on an individual basis and not in a class, consolidated or representative action. You and CPS agree that any cause of action arising out of or related to the CPS site (including but not limited to any services provided or made available therein) or this Agreement must commence within one (1) year after the cause of action arose; otherwise, such cause of action is permanently barred.</p><br>

                <p>If you have a dispute with one or more users or sellers, you release CPS (and CPS's officers, directors, agents, subsidiaries, joint ventures and employees) from claims demands and damages (actual and consequential) of every kind of nature, known and unknown, arising out of or in any way connected with such disputes. </p>

                <p class="title title2">General</p>

                <p>We accept no liability for any failure to comply with this agreement where such failure is due to circumstances beyond our reasonable control.
                    If we waive any rights available to us under this agreement on one occasion, this does not mean that those rights will automatically be waived on any other occasion.
                </p><br>

                <p>If any of the terms of this agreement are held to be invalid, unenforceable or illegal for any reason, the remaining terms and conditions shall nevertheless continue in full force.
                </p><br>

                <p>You may close your account at any time by logging into your account.</p><br>

                <p>This service may contain translations powered by Google. Google disclaims all warranties related to the translations, express or implied, including any warranties of accuracy, reliability, and any implied warranties of merchantability, fitness for a particular purpose and noninfringement.</p>

                <p class="title title2">APPENDIX A - Services Agreement</p>

                <p>You wish to use CPS’s services to facilitate marketing and sale of your art and to arrange for manufacture and delivery or pick up of a physical product ("your product") once an order has been made through www.canvasprintstudio.com.au ("the website"). CPS will provide these services on the terms set out in this Services Agreement.</p><br>

                <p>(The terms “CPS”, “we”, “us”, “our” refers to Canvas Print Studio)</p>

                <p class="title title2">1. Services</p>

                <p>1.1 CPS, acting as independent contractor under your instructions will market to and obtain orders from customers for the purchase of your products over the website and on instruction from you, CPS. will arrange for third parties if need be to fulfil those orders by facilitating payment for and manufacture of your products (“Services”). CPS will then arrange for the delivery or pickup from designated location of your products as per the customer’s instructions.</p><br>

                <p>1.2 CPS will provide the Services pursuant to this agreement until termination in accordance with its terms.</p><br>

                <p>1.3 You agree that CPS is free to act in any capacity for any other person interested in promoting, marketing and obtaining orders from members of the public for the purchase of their arts over the website, including any art that is the same as, or similar to, your products.</p>

                <p class="title title2">2. License and standing instructions</p>

                <p>2.1 You grant CPS a non-exclusive royalty free license to use your intellectual property relating to your products for the purpose of enabling us to carry out the Services.</p><br>

                <p>2.2 You hereby instruct CPS. to facilitate payment, manufacture and shipping in respect of the orders for your product(s) via the website and CPS. will facilitate such payment, manufacturing and shipping in accordance with reasonable business practices unless you otherwise instruct prior to the placement of that order by a customer.</p>

                <p class="title title2">3. Sale of your products</p>

                <p>3.1 The retail price charged to customers who purchase your product is made up of the manufacturing fee and CPS’s fee for hosting the marketplace and facilitating the transaction (the manufacturing fee and CPS fee are referred to collectively, and inclusive of tax, as the “base amount”), your creator margin (“your margin”), and any relevant tax (such as Sales Tax, GST, VAT, etc). </p><br>

                <p>Shipping charges will also be added. When making each individual work available for sale you are able to select any percentage markup you wish, greater than or equal to 0, above the base amount but below the automated upper limit set by CPS (subject to change from time to time). The percentage markup selected by you on the website for each of your products is used to calculate the dollar value of your margin for each sale.</p><br>

                <p>3.2 You may change the percentage markup on top of the base amount at any time by changing your selection on the website. We may change the base amount at any time without specific notice to you and this will affect the dollar value of your margin, which is calculated as a percentage of the base amount (e.g. if we increase our base amount, your margin will also increase). The retail price will not change on an individual sale after a customer has submitted an order to the website.</p><br>

                <p>3.3 CPS will send you an email to the email address you registered in your account to notify you when an order has been placed for your products.</p><br>

                <p>3.4 You agree that CPS makes no representation that it will be able to procure an order for your products, whether at the retail price or at all, nor that you will obtain any benefit by entering into this Services Agreement.
                </p>

                <p class="title title2">4. Payment terms</p>

                <p>4.1 You authorize CPS to collect, hold and distribute the retail price and shipping charges (“sale proceeds”) from customers on the terms set out in this clause 4.</p><br>

                <p>4.2 You authorize CPS to deduct the base amount and the shipping charges from the sales proceeds for your products before distributing your margin, and tax where relevant to you.</p><br>

                <p>4.3 We will either initiate a PayPal deposit or direct bank deposit before the 15th day of the month for sales made in the previous month depending on your choice.</p><br>

                <p>4.4 If your elected payment method is by direct bank transfer or PayPal transfer and your earnings for the month in the applicable currency are less than 20 Australian Dollars then CPS reserves the right to roll that amount over to the following month and continue to roll it over until you have earned at least the above mentioned amount.</p><br>

                <p>4.5 Despite clauses 4.4 and 4.5, you may request payment at any time for the full amount in your account and a AUS$10 administration fee will apply. CPS will pay this amount to you within 7 days of your request.</p> <br>

                <p>4.6 It is your responsibility to ensure CPS has current bank account or Paypal details. CPS will not be liable for any loss suffered by you if you provide us with incorrect details in relation to the payment method. If we are unable to pay you because you have given us incorrect details or your details are out of date, we will hold your margin for up to 12 months from the payment date. If you have not notified CPS of any amendment to the payment method details in that time, you authorize us to donate your margin proceeds to a charity of our choice.</p>

                <p class="title title2">5. Taxation responsibility</p>

                <p>5.1 Each party is responsible for their own taxes associated with each transaction and will account for any taxes imposed by governments or governing authorities, and related accounting or audit requirements arising out of, as a result of, incidental to, or in connection with obligations under this Services Agreement. We recommend that you consult with your tax advisor as to the application of taxes for you, as the seller of the merchandise. This may include sales tax, VAT, GST and other transactional taxes.</p><br>

                <p>5.2 You will indicate to us on the website whether you are registered for Goods and Services Tax (GST) or similar taxes. If you are required to add GST to your products, that amount will be added to the price charged to the customer. We will collect that amount on your behalf and distribute it to you with your margin using the payment method you have selected on the website.</p><br>

                <p>5.3 If you have an Australian Business Number (ABN) you may submit your ABN to the website where requested. If you do not have an ABN, or if you elect not to submit your ABN to the website, you will be required to provide more information about the circumstances under which you are offering your products for sale on the website, including whether any of the Australian Taxation Office (ATO) exemptions apply to you.</p><br>

                <p>5.4 If you are a resident of the UK or EU, CPS will collect and remit to HMRC VAT on your behalf on the artist margin portion of your sales at a rate of 20% for all sales of goods manufactured in the UK or EU and sold into the UK or EU. Any and all VAT reporting and remittance responsibilities by you to relevant tax authorities, in excess of this withholding are entirely your responsibility.</p><br>

                <p>5.5 For the avoidance of doubt, all tax-related reporting responsibilities by you to relevant tax authorities are entirely your responsibility.</p>

                <p class="title title2">6. Indemnity</p>

                <p>6.1 You hereby indemnify and will keep CPS indemnified from and against all claims, debts, accounts, expenses, costs, liens, actions and proceedings of any nature whatsoever, whether known or unknown by any person, arising from, incidental to, or by virtue of, the appointment, or any breach or non performance of your obligations under this Services Agreement or arising out of your wilful act, neglect or default in the performance of such obligations.</p><br>

                <p>6.2 This clause 6 will survive the termination of this Services Agreement.</p>

                <p class="title title2">7. Limitation of liability</p>

                <p>7.1 In no case will CPS be liable for any consequential loss or damage suffered by you arising from this Services Agreement. To the extent permitted by law, all warranties and conditions implied by law are hereby expressly excluded.</p>

                <p class="title title2">8. Terminating this agreement</p>

                <p>8.1 You can give notice of termination of this Services Agreement by closing your account in the method described in the User Agreement.
                </p><br>

                <p>8.2 CPS may give notice of termination of this Services Agreement to you in writing at any time.</p><br>

                <p>8.3 After notice of termination in the manner described in either clause 8.1 or 8.2, you authorize us to complete any transactions in progress in relation to your products, which we will do on the terms of this Services Agreement. Termination of this Services Agreement will take effect once these transactions have been completed.</p><br>

                <p>8.4 Upon termination of this Services Agreement by either party, CPS will pay you any accrued member margin proceeds from your account, less a AUS$10 administration fee.</p>
            </div>
        </div>
    </div>
</div>
<div class="hint_wrapper artworks_overview" id="faq" style="display:none;">
    <div class="hint_background"></div>
    <div class="hint_outside">
        <button class="hint_close"></button>
        <div class="hint_body_out">
            <div class="hint_body">
                <div class="content-myartworks">
                    <div id="tabbed-nav">
                        <ul>
                            @foreach($faqs as $faq)
                                <li> <a href="">
                                        {{$faq->title}}
                                    </a> </li>
                            @endforeach

                        </ul>
                        <div class="right_side-FAQ">
                            @foreach($faqs as $faq)
                                <div>
                                    <p class="title title2">{{$faq->title}}</p>
                                    {!! $faq->description !!}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hint_wrapper" @if(!session('modal-error')) style="display: none" @endif>
    <div class="hint_background"></div>
    <div class="hint_outside">
        <button class="hint_close"></button>
        <div class="hint_body">
            <p class="hello">Incorrect email or password!</p>
            <p>Please write correct information.</p>
            <a class="ok">OK</a>
        </div>
    </div>
</div>
<div class="hint_wrapper" @if(!session('user-error')) style="display: none" @endif>
    <div class="hint_background"></div>
    <div class="hint_outside">
        <button class="hint_close"></button>
        <div class="hint_body">
            <p class="hello">This email is already in use!</p>
            <p>Please write correct email.</p>
            <a class="ok">OK</a>
        </div>
    </div>
</div>
<div class="hint_wrapper" @if(!session('modal-error-big-file')) style="display: none" @endif>
    <div class="hint_background"></div>
    <div class="hint_outside">
        <button class="hint_close"></button>
        <div class="hint_body">
            <p class="hello">Your file is too big!</p>
            <a class="ok">OK</a>
        </div>
    </div>
</div>
<div class="hint_wrapper" @if(!session('small-file')) style="display: none" @endif>
    <div class="hint_background"></div>
    <div class="hint_outside">
        <button class="hint_close"></button>
        <div class="hint_body">
            <p class="hello"style="    line-height: 40px;">Hmmm, looks like your image might be low quality. You can upload a higher resolution image or contact us and we will review it!</p>
            <a class="ok">OK</a>
        </div>
    </div>
</div>
<div class="hint_wrapper" @if(!session('big-file')) style="display: none" @endif>
    <div class="hint_background"></div>
    <div class="hint_outside">
        <button class="hint_close"></button>
        <div class="hint_body">
            <p class="hello" style="    line-height: 40px;">Oh no, looks like your file is too big" Please contact us and we will email you a link for uploading!</p>
            <a class="ok">OK</a>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="vrew8hjhb3bzqlk"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="{{asset('js/hints.js')}}"></script>
<link href="{{asset('tabs/zozo.tabs.min.css')}}" rel="stylesheet">
<script src="{{asset('tabs/zozo.tabs.min.js')}}"></script>
<script>
    jQuery(document).ready(function ($) {
        $("#tabbed-nav").zozoTabs({
            orientation: "vertical",
            defaultTab: 'none'
            , animation: {
                effects: "none"
            }
        })
    });
</script>
<script>
    jQuery(function ($) {
        $(".hamburger").click(function () {
            $(".navigation").toggleClass("open");
            if ($("nav").hasClass("open")) {
                $(".hamburger").css("position", "fixed");
            }
            else {
                $(".hamburger").css("position", "absolute");
            }
        })
    });
</script>
<script>

    var target_size = $(".section2").offset().top;

    $(".sell_art").click(function() {
        $('html, body').animate({
            scrollTop: target_size
        }, 1000);
    });

</script>

<script>

    options = {

        // Required. Called when a user selects an item in the Chooser.
        success: function(files) {

            $('#files_dropbox').val(files[0].link);
            $('#upload-form').submit();

            //var msg = $('#drop-upload-form').serialize();


            /*$.ajax({
             type: 'POST',
             url: '/ajax/upload-from-dropbox/',
             data: msg,
             success: function(data1) {
             alert(data1);
             }
             });*/
            //alert("Here's the file link: " + files[0].link)
        },

        // Optional. Called when the user closes the dialog without selecting a file
        // and does not include any parameters.
        cancel: function() {

        },

        // Optional. "preview" (default) is a preview link to the document for sharing,
        // "direct" is an expiring link to download the contents of the file. For more
        // information about link types, see Link types below.
        linkType: "direct", // or "direct"

        // Optional. A value of false (default) limits selection to a single file, while
        // true enables multiple file selection.
        multiselect: false, // or true

        // Optional. This is a list of file extensions. If specified, the user will
        // only be able to select files with these extensions. You may also specify
        // file types, such as "video" or "images" in the list. For more information,
        // see File types below. By default, all extensions are allowed.
        extensions: ['.jpg', '.png', '.gif'],
    };
    //var button = Dropbox.createChooseButton(options);
    //document.getElementById("container").appendChild(button);
    //Dropbox.choose(options);

    jQuery(function ($) {

        $('#drop-button').click(function(){
            Dropbox.choose(options);
        });

    });
</script>
<script>
    $(".drag-n-drop .fake-btn").click(function () {
        $(".drag-n-drop .file-input").trigger("click");

        var w_size = $(document).width();
        if (w_size <= 768) {
            $('.drag-n-drop').css({
                "flex-direction": 'column'
                , "display": 'flex'
                , "justify-content": 'space-around'
            });
        }
        else {
            $('.drag-n-drop').css({
                "display": 'flex'
                , "justify-content": 'space-around'
                , "flex-direction": 'row'
            });
        }
        $(".file-input").change(function () {
            $(".drag-n-drop .format").hide(0);
            $('.drag-n-drop .drop-text').css({
                "bottom": '15px'
                , "height": '47px'
            });
            $('.drag-n-drop .drop-text .text').css("margin", '0');
            $(".drag-n-drop .left").css('display', 'block');
            $(".drag-n-drop .file-input").css('display', 'none');
        })

    });
    $(".left i").click(function () {
        $(this).parent(".download-item").remove();
    })
    document.getElementById('upload').onchange = function() {
        if (this.files[0]) {
            document.getElementById('html-uploaded-files').innerHTML = '<div class="download-item"><div class="download-title" title=""> ' + this.files[0].name + ' </div><div class="progress"><div class="bar"></div></div></div>';
            $(".drag-n-drop .progress .bar").css("width", "100%");
        }

    };
</script>
</body>

</html>


