<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="" />
    <meta name="description" content="{{$seo->description}}" />
    <meta name="keywords" content="{{$seo->keywords}}" />
    <meta name="Resource-type" content="Document" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=nо">
    <link rel="shortcut icon" href="{{ asset('img/landing-icons-facebook.png') }}favicon.ico">
    <title>{{$seo->title}}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('owl.carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('owl.carousel/assets/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('owl.carousel/assets/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.modal.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{asset('css/hints.css')}}">
</head>

<body>
<div class="wrapper wrapper-landings wrapper-gallery wrapper-gallery-all">
    @include('main-menu')
    <div class="content-landing">
        <div class="sub-header">
            <div class="sub-inner"> <a class="nav_land nav1" href="{{url('print-your-own')}}"><span>PRINT YOUR OWN</span></a> <a class="nav_land nav2" href="{{url('gallery')}}"><span class="active">PRINT FROM OUR GALLERY</span></a> <a class="nav_land nav3" href="{{url('commercial-printing')}}"><span>COMMERCIAL PRINTING</span></a> </div>
        </div>
        <div class="form-out">
            <form id="filter-form" action="{{url('gallery/')}}" method="get">
                <div class="form-item">
                    <div class="select-main">
                        <select name="artist" id="sources0" class="custom-select sources" placeholder="Select Artist">
                            @if(count($artists) != 0)
                                @foreach($artists as $key => $artist)
                                    @if($artist->name != 'admin')
                                    <option class="artist-select" value="{{$artist->name}}">{{$artist->name}}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-item">
                    <div class="select-main">
                        <select id="sources" name="style" class="custom-select sources" placeholder="Select style">
                            <option value="Fine Art">Fine Art</option>
                            <option value="Abstract">Abstract</option>
                            <option value="Impressionism">Impressionism</option>
                            <option value="Street art">Art Deco</option>
                            <option value="Street art">Street art</option>
                            <option value="Illustration">Illustration</option>
                            <option value="Contemporary">Contemporary</option>
                            <option value="Photography">Photography</option>
                            <option value="Mixed media">Mixed media</option>
                            <option value="Minimalism">Minimalism</option>
                            <option value="Pop art">Pop art</option>
                            <option value="Collage">Collage</option>
                            <option value="Digital">Digital</option>
                        </select>
                    </div>
                </div>
                <div class="form-item">
                    <div class="select-main">
                        <select name="subject" id="sources1" class="custom-select sources" placeholder="Select subject">
                            <option value="Portrait">Portrait</option>
                            <option value="Landscape">Landscape</option>
                            <option value="Still life">Still life</option>
                            <option value="Nature">Nature</option>
                            <option value="Beach">Beach</option>
                            <option value="Animal">Animal</option>
                            <option value="Architecture">Architecture</option>
                            <option value="B+W">B+W</option>
                            <option value="City">City</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Landmarks">Landmarks</option>
                        </select>
                    </div>
                </div>

                <div class="form-item">
                    <div class="select-main">
                        <select name="size" id="sources3" class="custom-select sources" placeholder="Select size">
                            <option value="profile">size1</option>
                            <option value="word">size2</option>
                            <option value="hashtag">size3</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="content-inner">
            <div class="section2">

                <div class="gallery" id="gallery">
                    @foreach($artwork as $img)
                        <a href="#ex1" rel="modal:open" class="gallery-item" data-art-id="{{$img->id}}" data-user-id="{{$img->user_id}}"> <img src="{{ asset('assets/upload/' . $img->image) }}" alt=""> <span class="img_text">
								<span class="img_text_inner">
									<span class="name">
										{{$img->title}}
									</span> <span class="author">
										by {{$img->name}}
									</span> </span>
                            </span>
                        </a>
                    @endforeach

                </div> <a href="" class="load-more-gallery" style="display: none;">Load more</a>
                <div class="section2-inner">
                    <div class="left">
                        <h1>Artist Gallery</h1>
                        <p>You'll find a unique selection of  artists offering an exceptional range of artworks. All stretched canvas prints are custom made in our Melbourne studio, using only archival premium grade materials.</p>
                    </div>
                    <div class="right">
                        <div class="left_inner">
                            <a href="{{url('my-account/registration')}}" class="title">Want to join Our Gallery?</a>
                            <div class="text">or contact us for help</div>
                            <a href="mailto:print@canvasprintstudio.com.au">print@canvasprintstudio.com.au</a> </div>
                        <div class="right_inner"> <img src="img/contact.png" alt=""> </div>
                    </div>
                </div>
            </div>
            <div class="section4">
                <h1>Additional Services</h1>
                <div class="group">
                    @foreach($additionalService as $data)
                        <div class="land-box box{{$data->id}}" style="background-image: url('../img/filter.png'), url('{{asset('assets/upload') . '/' . $data->image}}')">
                            <div class="title"> {{$data->title}} </div>
                            <div class="text-hover"> {{$data->description}} </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('canvas/footer')
    <div id="ex1" style="display:none;">

    </div>
    <!--модалка -->
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
    <div class="hint_wrapper artworks_overview" id="terms" style="display:none;">
        <div class="hint_background"></div>
        <div class="hint_outside">
            <button class="hint_close"></button>
            <div class="hint_body_out">
                <div class="hint_body">
                    <p class="title">TERMS OF SERVICE</p>
                    <p class="title title2">OVERVIEW</p>

                    <p>This website is operated by Canvas Print Studio. Throughout the site, the terms “we”, “us” and
                        “our” refer to Canvas Print Studio. Canvas Print Studio offers this website, including all
                        information,copy tools and services available from this site to you, the user, conditioned upon
                        your acceptance of all terms, conditions, policies and notices stated here.
                    </p><br>

                    <p>By visiting our site and/ or purchasing something from us, you engage in our “Service” and
                        agree to be bound by the following terms and conditions (“Terms of Service”, “Terms”), including
                        those additional terms and conditions and policies referenced herein and/or available by
                        hyperlink. These Terms of Service apply to all users of the site, including without limitation
                        users who are browsers, vendors, customers, merchants, and/ or contributors of content.</p><br>

                    <p>Please read these Terms of Service carefully before accessing or using our website. By
                        accessing or using any part of the site, you agree to be bound by these Terms of Service. If you
                        do not agree to all the terms and conditions of this agreement, then you may not access the
                        website or use any services. If these Terms of Service are considered an offer, acceptance is
                        expressly limited to these Terms of Service.
                    </p><br>

                    <p>Any new features or tools which are added to the current store shall also be subject to the
                        Terms of Service. You can review the most current version of the Terms of Service at any time
                        on this page. We reserve the right to update, change or replace any part of these Terms of
                        Service by posting updates and/or changes to our website. It is your responsibility to check this
                        page periodically for changes. Your continued use of or access to the website following the
                        posting of any changes constitutes acceptance of those changes.
                    </p>

                    <p class="title title2">SECTION 1 - ONLINE STORE TERMS</p>

                    <p>By agreeing to these Terms of Service, you represent that you are at least the age of majority in
                        your state or province of residence, or that you are the age of majority in your state or province
                        of residence and you have given us your consent to allow any of your minor dependents to use
                        this site.
                    </p><br>

                    <p>You may not use our products for any illegal or unauthorized purpose nor may you, in the use of
                        the Service, violate any laws in your jurisdiction (including but not limited to copyright laws).
                        You must not transmit any worms or viruses or any code of a destructive nature.
                        A breach or violation of any of the Terms will result in an immediate termination of your
                        Services.
                    </p>

                    <p class="title title2">SECTION 2 - GENERAL CONDITIONS</p>

                    <p>We reserve the right to refuse service to anyone for any reason at any time.
                        You understand that your content (not including credit card information), may be transferred
                        unencrypted and involve (a) transmissions over various networks; and (b) changes to conform
                        and adapt to technical requirements of connecting networks or devices. Credit card information
                        is always encrypted during transfer over networks.
                        You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use
                        of the Service, or access to the Service or any contact on the website through which the service
                        is provided, without express written permission by us.
                        The headings used in this agreement are included for convenience only and will not limit or
                        otherwise affect these Terms.
                    </p>

                    <p class="title title2">SECTION 3 - ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION</p>

                    <p>We are not responsible if information made available on this site is not accurate, complete or
                        current. The material on this site is provided for general information only and should not be
                        relied upon or used as the sole basis for making decisions without consulting primary, more
                        accurate, more complete or more timely sources of information. Any reliance on the material on
                        this site is at your own risk.
                        This site may contain certain historical information. Historical information, necessarily, is not
                        current and is provided for your reference only. We reserve the right to modify the contents of
                        this site at any time, but we have no obligation to update any information on our site. You agree
                        that it is your responsibility to monitor changes to our site.
                    </p>

                    <p class="title title2">SECTION 4 - MODIFICATIONS TO THE SERVICE AND PRICES</p>

                    <p>Prices for our products are subject to change without notice.
                        We reserve the right at any time to modify or discontinue the Service (or any part or content
                        thereof) without notice at any time.
                        We shall not be liable to you or to any third-party for any modification, price change, suspension
                        or discontinuance of the Service.
                    </p>

                    <p class="title title2">SECTION 5 - PRODUCTS OR SERVICES (if applicable)</p>

                    <p>Certain products or services may be available exclusively online through the website. These
                        products or services may have limited quantities and are subject to return or exchange only
                        according to our Return Policy.
                        We have made every effort to display as accurately as possible the colors and images of our
                        products that appear at the store. We cannot guarantee that your computer monitor&#39;s display of
                        any color will be accurate.
                        We reserve the right, but are not obligated, to limit the sales of our products or Services to any
                        person, geographic region or jurisdiction. We may exercise this right on a case-by- case basis.
                        We reserve the right to limit the quantities of any products or services that we offer. All
                        descriptions of products or product pricing are subject to change at anytime without notice, at
                        the sole discretion of us. We reserve the right to discontinue any product at any time. Any offer
                        for any product or service made on this site is void where prohibited.
                        We do not warrant that the quality of any products, services, information, or other material
                        purchased or obtained by you will meet your expectations, or that any errors in the Service will
                        be corrected.
                    </p>

                    <p class="title title2">SECTION 6 - ACCURACY OF BILLING AND ACCOUNT INFORMATION</p>

                    <p>We reserve the right to refuse any order you place with us. We may, in our sole discretion, limit
                        or cancel quantities purchased per person, per household or per order. These restrictions may
                        include orders placed by or under the same customer account, the same credit card, and/or
                        orders that use the same billing and/or shipping address. In the event that we make a change to
                        or cancel an order, we may attempt to notify you by contacting the e-mail and/or billing
                        address/phone number provided at the time the order was made. We reserve the right to limit or
                        prohibit orders that, in our sole judgment, appear to be placed by dealers, resellers or
                        distributors. </p><br>

                    <p>You agree to provide current, complete and accurate purchase and account information for all
                        purchases made at our store. You agree to promptly update your account and other information,
                        including your email address and credit card numbers and expiration dates, so that we can
                        complete your transactions and contact you as needed. </p><br>

                    <p>For more detail, please review our Returns Policy.</p>

                    <p class="title title2">SECTION 7 - OPTIONAL TOOLS</p>

                    <p>We may provide you with access to third-party tools over which we neither monitor nor have any
                        control nor input.
                        You acknowledge and agree that we provide access to such tools ”as is” and “as available”
                        without any warranties, representations or conditions of any kind and without any endorsement.
                        We shall have no liability whatsoever arising from or relating to your use of optional third-party
                        tools.
                        Any use by you of optional tools offered through the site is entirely at your own risk and
                        discretion and you should ensure that you are familiar with and approve of the terms on which
                        tools are provided by the relevant third-party provider(s).
                        We may also, in the future, offer new services and/or features through the website (including,
                        the release of new tools and resources). Such new features and/or services shall also be
                        subject to these Terms of Service.
                    </p>

                    <p class="title title2">SECTION 8 - THIRD-PARTY LINKS</p>

                    <p>Certain content, products and services available via our Service may include materials from
                        third-parties.
                        Third-party links on this site may direct you to third-party websites that are not affiliated with us.
                        We are not responsible for examining or evaluating the content or accuracy and we do not
                        warrant and will not have any liability or responsibility for any third-party materials or websites,
                        or for any other materials, products, or services of third-parties.
                        We are not liable for any harm or damages related to the purchase or use of goods, services,
                        resources, content, or any other transactions made in connection with any third-party websites.
                        Please review carefully the third-party&#39;s policies and practices and make sure you understand
                        them before you engage in any transaction. Complaints, claims, concerns, or questions
                        regarding third-party products should be directed to the third-party.</p>

                    <p class="title title2">SECTION 9 - USER COMMENTS, FEEDBACK AND OTHER SUBMISSIONS</p>

                    <p>If, at our request, you send certain specific submissions (for example contest entries) or without
                        a request from us you send creative ideas, suggestions, proposals, plans, or other materials,
                        whether online, by email, by postal mail, or otherwise (collectively, &#39;comments&#39;), you agree that
                        we may, at any time, without restriction, edit, copy, publish, distribute, translate and otherwise
                        use in any medium any comments that you forward to us. We are and shall be under no
                        obligation (1) to maintain any comments in confidence; (2) to pay compensation for any
                        comments; or (3) to respond to any comments.
                        We may, but have no obligation to, monitor, edit or remove content that we determine in our
                        sole discretion are unlawful, offensive, threatening, libelous, defamatory, pornographic, obscene
                        or otherwise objectionable or violates any party’s intellectual property or these Terms of Service.
                        You agree that your comments will not violate any right of any third-party, including copyright,
                        trademark, privacy, personality or other personal or proprietary right. You further agree that your
                        comments will not contain libelous or otherwise unlawful, abusive or obscene material, or
                        contain any computer virus or other malware that could in any way affect the operation of the
                        Service or any related website. You may not use a false e-mail address, pretend to be someone
                        other than yourself, or otherwise mislead us or third-parties as to the origin of any comments.
                        You are solely responsible for any comments you make and their accuracy. We take no
                        responsibility and assume no liability for any comments posted by you or any third-party.
                    </p>

                    <p class="title title2">SECTION 10 - PERSONAL INFORMATION</p>

                    <p>Your submission of personal information through the store is governed by our Privacy Policy. To
                        view our Privacy Policy.
                    </p>

                    <p class="title title2">SECTION 11 - ERRORS, INACCURACIES AND OMISSIONS</p>

                    <p>Occasionally there may be information on our site or in the Service that contains typographical
                        errors, inaccuracies or omissions that may relate to product descriptions, pricing, promotions,
                        offers, product shipping charges, transit times and availability. We reserve the right to correct
                        any errors, inaccuracies or omissions, and to change or update information or cancel orders if
                        any information in the Service or on any related website is inaccurate at any time without prior
                        notice (including after you have submitted your order).
                        We undertake no obligation to update, amend or clarify information in the Service or on any
                        related website, including without limitation, pricing information, except as required by law. No
                        specified update or refresh date applied in the Service or on any related website, should be
                        taken to indicate that all information in the Service or on any related website has been modified
                        or updated.
                    </p>

                    <p class="title title2">SECTION 12 - PROHIBITED USES</p>

                    <p>In addition to other prohibitions as set forth in the Terms of Service, you are prohibited from
                        using the site or its content: (a) for any unlawful purpose; (b) to solicit others to perform or
                        participate in any unlawful acts; (c) to violate any international, federal, provincial or state
                        regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual
                        property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm,
                        defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation,
                        religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading
                        information; (g) to upload or transmit viruses or any other type of malicious code that will or may
                        be used in any way that will affect the functionality or operation of the Service or of any related
                        website, other websites, or the Internet; (h) to collect or track the personal information of others;
                        (i) to spam, phish, pharm, pretext, spider, crawl, or scrape; (j) for any obscene or immoral
                        purpose; or (k) to interfere with or circumvent the security features of the Service or any related
                        website, other websites, or the Internet. We reserve the right to terminate your use of the
                        Service or any related website for violating any of the prohibited uses.
                    </p>

                    <p class="title title2">SECTION 13 - DISCLAIMER OF WARRANTIES; LIMITATION OF LIABILITY</p>

                    <p>We do not guarantee, represent or warrant that your use of our service will be uninterrupted,
                        timely, secure or error-free.
                        We do not warrant that the results that may be obtained from the use of the service will be
                        accurate or reliable.
                        You agree that from time to time we may remove the service for indefinite periods of time or
                        cancel the service at any time, without notice to you.
                        You expressly agree that your use of, or inability to use, the service is at your sole risk. The
                        service and all products and services delivered to you through the service are (except as
                        expressly stated by us) provided &#39;as is&#39; and &#39;as available&#39; for your use, without any
                        representation, warranties or conditions of any kind, either express or implied, including all
                        implied warranties or conditions of merchantability, merchantable quality, fitness for a particular
                        purpose, durability, title, and non-infringement.
                        In no case shall Canvas Print Studio, our directors, officers, employees, affiliates, agents,
                        contractors, interns, suppliers, service providers or licensors be liable for any injury, loss, claim,
                        or any direct, indirect, incidental, punitive, special, or consequential damages of any kind,
                        including, without limitation lost profits, lost revenue, lost savings, loss of data, replacement
                        costs, or any similar damages, whether based in contract, tort (including negligence), strict
                        liability or otherwise, arising from your use of any of the service or any products procured using
                        the service, or for any other claim related in any way to your use of the service or any product,
                        including, but not limited to, any errors or omissions in any content, or any loss or damage of
                        any kind incurred as a result of the use of the service or any content (or product) posted,
                        transmitted, or otherwise made available via the service, even if advised of their possibility.
                        Because some states or jurisdictions do not allow the exclusion or the limitation of liability for
                        consequential or incidental damages, in such states or jurisdictions, our liability shall be limited
                        to the maximum extent permitted by law.
                    </p>

                    <p class="title title2">SECTION 14 - INDEMNIFICATION</p>

                    <p>You agree to indemnify, defend and hold harmless Canvas Print Studio and our parent,
                        subsidiaries, affiliates, partners, officers, directors, agents, contractors, licensors, service
                        providers, subcontractors, suppliers, interns and employees, harmless from any claim or
                        demand, including reasonable attorneys’ fees, made by any third-party due to or arising out of
                        your breach of these Terms of Service or the documents they incorporate by reference, or your
                        violation of any law or the rights of a third-party.
                    </p>

                    <p class="title title2">SECTION 15 - SEVERABILITY</p>

                    <p>In the event that any provision of these Terms of Service is determined to be unlawful, void or
                        unenforceable, such provision shall nonetheless be enforceable to the fullest extent permitted
                        by applicable law, and the unenforceable portion shall be deemed to be severed from these
                        Terms of Service, such determination shall not affect the validity and enforceability of any other
                        remaining provisions.
                    </p>

                    <p class="title title2">SECTION 16 - TERMINATION</p>

                    <p>The obligations and liabilities of the parties incurred prior to the termination date shall survive
                        the termination of this agreement for all purposes.
                        These Terms of Service are effective unless and until terminated by either you or us. You may
                        terminate these Terms of Service at any time by notifying us that you no longer wish to use our
                        Services, or when you cease using our site.
                        If in our sole judgment you fail, or we suspect that you have failed, to comply with any term or
                        provision of these Terms of Service, we also may terminate this agreement at any time without
                        notice and you will remain liable for all amounts due up to and including the date of termination;
                        and/or accordingly may deny you access to our Services (or any part thereof).
                    </p>

                    <p class="title title2">SECTION 17 - ENTIRE AGREEMENT</p>

                    <p>The failure of us to exercise or enforce any right or provision of these Terms of Service shall not
                        constitute a waiver of such right or provision.
                        These Terms of Service and any policies or operating rules posted by us on this site or in
                        respect to The Service constitutes the entire agreement and understanding between you and us
                        and govern your use of the Service, superseding any prior or contemporaneous agreements,
                        communications and proposals, whether oral or written, between you and us (including, but not
                        limited to, any prior versions of the Terms of Service).
                        Any ambiguities in the interpretation of these Terms of Service shall not be construed against
                        the drafting party.
                    </p>

                    <p class="title title2">SECTION 18 - GOVERNING LAW</p>

                    <p>These Terms of Service and any separate agreements whereby we provide you Services shall
                        be governed by and construed in accordance with the laws of 1/10-12 Moreland Road
                        Brunswick East Victoria AU 3057.
                    </p>

                    <p class="title title2">SECTION 19 - CHANGES TO TERMS OF SERVICE</p>

                    <p>You can review the most current version of the Terms of Service at any time at this page.
                        We reserve the right, at our sole discretion, to update, change or replace any part of these
                        Terms of Service by posting updates and changes to our website. It is your responsibility to
                        check our website periodically for changes. Your continued use of or access to our website or
                        the Service following the posting of any changes to these Terms of Service constitutes
                        acceptance of those changes.
                    </p>

                    <p class="title title2">SECTION 20 - CONTACT INFORMATION</p>

                    <p>Questions about the Terms of Service should be sent to us at <a href="">print@canvasprintstudio.com.au.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="hint_wrapper artworks_overview" id="privacy" style="display:none;">
        <div class="hint_background"></div>
        <div class="hint_outside">
            <button class="hint_close"></button>
            <div class="hint_body_out">
                <div class="hint_body">
                    <p class="title">Privacy Policy</p>
                    <br>
                    <p>This privacy policy has been compiled to better serve those who are concerned with how their
                        &#39;Personally Identifiable Information&#39; (PII) is being used online. PII, as described in US privacy
                        law and information security, is information that can be used on its own or with other information
                        to identify, contact, or locate a single person, or to identify an individual in context. Please read
                        our privacy policy carefully to get a clear understanding of how we collect, use, protect or
                        otherwise handle your Personally Identifiable Information in accordance with our website.
                    </p>

                    <p class="title title2">What personal information do we collect from the people that visit our blog, website or app?</p>

                    <p>When ordering or registering on our site, as appropriate, you may be asked to enter your name,
                        email address, mailing address, phone number, credit card information or other details to help
                        you with your experience.
                    </p>

                    <p class="title title2">When do we collect information?</p>

                    <p>We collect information from you when you register on our site, place an order, subscribe to a
                        newsletter or enter information on our site.
                    </p>

                    <p>Provide us with feedback on our products or services.
                    </p>

                    <p class="title title2">How do we use your information?</p>

                    <p>We may use the information we collect from you when you register, make a purchase, sign up
                        for our newsletter, respond to a survey or marketing communication, surf the website, or use
                        certain other site features in the following ways:</p>
                    <ul>
                        <li>To personalize your experience and to allow us to deliver the type of content and
                            product offerings in which you are most interested.</li>
                        <li>To allow us to better service you in responding to your customer service requests.</li>
                        <li>To quickly process your transactions.</li>
                        <li>To follow up with them after correspondence (live chat, email or phone inquiries)</li>
                    </ul>

                    <p class="title title2">How do we protect your information?</p>

                    <p>Our website is scanned on a regular basis for security holes and known vulnerabilities in order
                        to make your visit to our site as safe as possible.
                    </p><br>

                    <p>We use regular Malware Scanning.
                    </p>

                    <p>Your personal information is contained behind secured networks and is only accessible by a
                        limited number of persons who have special access rights to such systems, and are required to
                        keep the information confidential. In addition, all sensitive/credit information you supply is
                        encrypted via Secure Socket Layer (SSL) technology.
                        We implement a variety of security measures when a user places an order enters, submits, or
                        accesses their information to maintain the safety of your personal information.</p><br>

                    <p>All transactions are processed through a gateway provider and are not stored or processed on
                        our servers.
                    </p>

                    <p class="title title2">Do we use &#39;cookies&#39;?</p>

                    <p>Yes. Cookies are small files that a site or its service provider transfers to your computer&#39;s hard
                        drive through your Web browser (if you allow) that enables the site&#39;s or service provider&#39;s
                        systems to recognize your browser and capture and remember certain information. For
                        instance, we use cookies to help us remember and process the items in your shopping cart.
                        They are also used to help us understand your preferences based on previous or current site
                        activity, which enables us to provide you with improved services. We also use cookies to help
                        us compile aggregate data about site traffic and site interaction so that we can offer better site
                        experiences and tools in the future.
                    </p><br>

                    <p>We use cookies to:</p>
                    <ul>
                        <li>Help remember and process the items in the shopping cart.</li>
                        <li>Keep track of advertisements.</li>
                        <li>Compile aggregate data about site traffic and site interactions in order to offer better site
                            experiences and tools in the future. We may also use trusted third-party services that track this
                            information on our behalf.</li>
                    </ul>
                    <br>

                    <p>You can choose to have your computer warn you each time a cookie is being sent, or you can
                        choose to turn off all cookies. You do this through your browser settings. Since browser is a little
                        different, look at your browser&#39;s Help Menu to learn the correct way to modify your cookies.
                    </p><br>

                    <p>If you turn cookies off, Some of the features that make your site experience more efficient may
                        not function properly.It won&#39;t affect the user&#39;s experience that make your site experience more
                        efficient and may not function properly.</p>

                    <p class="title title2">Third-party disclosure</p>

                    <p>We do not sell, trade, or otherwise transfer to outside parties your Personally Identifiable
                        Information unless we provide users with advance notice. This does not include website hosting
                        partners and other parties who assist us in operating our website, conducting our business, or
                        serving our users, so long as those parties agree to keep this information confidential. We may
                        also release information when it&#39;s release is appropriate to comply with the law, enforce our site
                        policies, or protect ours or others&#39; rights, property or safety.
                    </p><br>

                    <p>However, non-personally identifiable visitor information may be provided to other parties for
                        marketing, advertising, or other uses.</p>

                    <p class="title title2">Third-party links</p>

                    <p>Occasionally, at our discretion, we may include or offer third-party products or services on our
                        website. These third-party sites have separate and independent privacy policies. We therefore
                        have no responsibility or liability for the content and activities of these linked sites. Nonetheless,
                        we seek to protect the integrity of our site and welcome any feedback about these sites.
                    </p>

                    <p class="title title2">Google</p>

                    <p>Google&#39;s advertising requirements can be summed up by Google&#39;s Advertising Principles. They
                        are put in place to provide a positive experience for users.
                        <a href="https://support.google.com/adwordspolicy/answer/1316548?hl=en">https://support.google.com/adwordspolicy/answer/1316548?hl=en</a>
                    </p>

                    <p class="title title2">We use Google AdSense Advertising on our website.</p>

                    <p>Google, as a third-party vendor, uses cookies to serve ads on our site. Google&#39;s use of the
                        DART cookie enables it to serve ads to our users based on previous visits to our site and other
                        sites on the Internet. Users may opt-out of the use of the DART cookie by visiting the Google Ad
                        and Content Network privacy policy.</p><br>

                    <p>We have implemented the following: </p>
                    <ul>
                        <li>Remarketing with Google AdSense</li>
                        <li>Google Display Network Impression Reporting</li>
                        <li>Demographics and Interests Reporting</li>
                        <li>DoubleClick Platform Integration</li>
                    </ul><br>

                    <p>We, along with third-party vendors such as Google use first-party cookies (such as the Google
                        Analytics cookies) and third-party cookies (such as the DoubleClick cookie) or other third-party
                        identifiers together to compile data regarding user interactions with ad impressions and other ad
                        service functions as they relate to our website.</p><br>

                    <p>
                        Opting out:
                    </p>

                    <p>Users can set preferences for how Google advertises to you using the Google Ad Settings
                        page. Alternatively, you can opt out by visiting the Network Advertising Initiative Opt Out page or
                        by using the Google Analytics Opt Out Browser add on.</p>

                    <p class="title title2">California Online Privacy Protection Act</p>

                    <p>CalOPPA is the first state law in the nation to require commercial websites and online services
                        to post a privacy policy. The law&#39;s reach stretches well beyond California to require any person
                        or company in the United States (and conceivably the world) that operates websites collecting
                        Personally Identifiable Information from California consumers to post a conspicuous privacy
                        policy on its website stating exactly the information being collected and those individuals or
                        companies with whom it is being shared. - See more at: <a href="http://consumercal.org/california-online-
                        privacy-protection- act-caloppa/#sthash.0FdRbT51.dpuf">http://consumercal.org/california-online-
                            privacy-protection- act-caloppa/#sthash.0FdRbT51.dpuf</a>
                    </p><br>

                    <p>According to CalOPPA, we agree to the following: <br>
                        Users can visit our site anonymously.Once this privacy policy is created, we will add a link to it on our home page or as a minimum,
                        on the first significant page after entering our website.Our Privacy Policy link includes the word &#39;Privacy&#39; and can easily be found on the page
                        specified above.
                    </p><br>

                    <p>You will be notified of any Privacy Policy changes:</p>
                    <ul>
                        <li>On our Privacy Policy Page</li>
                    </ul><br>

                    <p>Can change your personal information:</p>
                    <ul>
                        <li>By emailing us</li>
                    </ul>

                    <p class="title title2">How does our site handle Do Not Track signals?</p>

                    <p>We honor Do Not Track signals and Do Not Track, plant cookies, or use advertising when a Do
                        Not Track (DNT) browser mechanism is in place.</p>

                    <p class="title title2">Does our site allow third-party behavioral tracking?</p>

                    <p>It&#39;s also important to note that we allow third-party behavioral tracking.
                    </p>

                    <p class="title title2">COPPA (Children Online Privacy Protection Act)</p>

                    <p>When it comes to the collection of personal information from children under the age of 13 years
                        old, the Children&#39;s Online Privacy Protection Act (COPPA) puts parents in control. The Federal
                        Trade Commission, United States&#39; consumer protection agency, enforces the COPPA Rule,
                        which spells out what operators of websites and online services must do to protect children&#39;s
                        privacy and safety online.
                    </p><br>
                    <p>We do not specifically market to children under the age of 13 years old.</p>

                    <p class="title title2">Fair Information Practices</p>

                    <p>The Fair Information Practices Principles form the backbone of privacy law in the United States
                        and the concepts they include have played a significant role in the development of data
                        protection laws around the globe. Understanding the Fair Information Practice Principles and
                        how they should be implemented is critical to comply with the various privacy laws that protect
                        personal information.
                    </p><br>

                    <p>In order to be in line with Fair Information Practices we will take the following responsive action,
                        should a data breach occur:</p>
                    <ul>
                        <li>We will notify you via email</li>
                        <li>Other</li>
                    </ul><br>

                    <p>Once we are aware of the data breach, we will notify users within 7 days.</p><br>

                    <p>We also agree to the Individual Redress Principle which requires that individuals have the right
                        to legally pursue enforceable rights against data collectors and processors who fail to adhere to
                        the law. This principle requires not only that individuals have enforceable rights against data
                        users, but also that individuals have recourse to courts or government agencies to investigate
                        and/or prosecute non-compliance by data processors.</p>

                    <p class="title title2">CAN SPAM Act</p>

                    <p>The CAN-SPAM Act is a law that sets the rules for commercial email, establishes requirements
                        for commercial messages, gives recipients the right to have emails stopped from being sent to
                        them, and spells out tough penalties for violations.
                    </p><br>

                    <p>We collect your email address in order to:
                    </p>
                    <ul>
                        <li>Send information, respond to inquiries, and/or other requests or questions.</li>
                        <li>Process orders and to send information and updates pertaining to orders.</li>
                        <li>Market to our mailing list or continue to send emails to our clients after the original
                            transaction has occurred.</li>
                    </ul><br>

                    <p>To be in accordance with CANSPAM, we agree to the following:</p>
                    <ul>
                        <li>Not use false or misleading subjects or email addresses.</li>
                        <li>Identify the message as an advertisement in some reasonable way.</li>
                        <li>Include the physical address of our business or site headquarters.</li>
                        <li>Monitor third-party email marketing services for compliance, if one is used.</li>
                        <li>Honor opt-out/unsubscribe requests quickly.</li>
                        <li>Allow users to unsubscribe by using the link at the bottom of each email.</li>
                    </ul><br>

                    <p>If at any time you would like to unsubscribe from receiving future emails, you can email us at:</p>
                    <ul>
                        <li>Follow the instructions at the bottom of each email.</li>
                    </ul><br>
                    <p>and we will promptly remove you from ALL correspondence.</p>

                    <p class="title title2">Contacting Us</p>

                    <p>If there are any questions regarding this privacy policy, you may contact us using the
                        information below.
                    </p>

                    <p><a href="http://canvasprintstudio.com.au/">http://canvasprintstudio.com.au/</a></p>
                    <p>1/10-12 Moreland Road</p>
                    <p>Brunswick East, VIC 3057
                        Australia</p>
                    <p><a href="mailto:print@canvasprintstudio.com.au">print@canvasprintstudio.com.au</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="hint_wrapper artworks_overview" id="shipping" style="display:none;">
        <div class="hint_background"></div>
        <div class="hint_outside">
            <button class="hint_close"></button>
            <div class="hint_body_out">
                <div class="hint_body">
                    <p class="title">SHIPPING POLICY</p><br>

                    <p>We offer free delivery across Australia to our customers on a standard delivery service. Once your order has been placed, you can expect to receive your canvas in 5 to 10 business days.
                    </p><br>

                    <p>As part of our commitment to providing a fast turnaround, we offer a flat express shipping rate of $45 for all orders within Australia. Our express delivery service is 3 to 6 business days once your order has been received.
                    </p><br>

                    <p>We can not guarantee that all our print sizes will be available to locations outside of our national regional network. You will be informed if there are any issue with your location.
                    </p><br>

                    <p>As per our terms and conditions, occasionally shipping delays occur due to reasons beyond our control. If shipping is delayed we will do everything possible to ensure your delivery arrives quickly, but we will not be liable for late arrivals.
                    </p><br>

                    <p>You the customer accept that if you are working to any deadlines, Canvas Print Studio are not liable for any missed deadlines or lost business because of shipping delays.
                    </p><br>

                    <p>If an order is lost or damaged in transit, we guarantee a replacement. Please note that we will require proof of damage for insurance purposes.
                    </p><br>

                    <p>If you have any additional questions about shipping or delivery please email us at <a href="http://canvasprintstudio.com.au/">print@canvasprintstudio.com.au</a> and we'll be happy to answer your queries.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--модалка - кінець-->
</div>
<!--модалка - кінець-->
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
    var w_size = $(document).width();
    if (w_size > 1280) {
        $('#ex1 form').submit(function (){
            if( $("#ex1 .custom-option").hasClass("selection") ){
                return true;
            } else {
                $("#ex1 .select-main").css("box-shadow", "red 0px 6px 15px -4px");
                $("#ex1 .custom-option").click(function(){
                    $("#ex1 .select-main").css("box-shadow", "none");
                })
                return false;
            }
        });
        $(".gallery-item").click(function(){
            $("#ex1 .select-main").css("box-shadow", "none");
        })
    }
</script>
<script>
    jQuery(function ($) {
        $(document).on('click', '.image.box', function () {
            $('.close-modal').trigger('click');
        });

        $(document).on('submit', '#filter-form', function(e){
            e.preventDefault();
            submitFrom($(this).serialize());

        });
        
        function submitFrom(data) {
            console.log('/ajax/get-artworks?' + data);

            $.ajax({
                url: '/ajax/get-artworks?' + data
            }).done(function (html) {

                $('#gallery').empty();
                $('#gallery').html(html);
            })
        }

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
    //				для модалки img ----
    $(document).ready(function () {
        $(document).on('click', '.artist-select', function(){
            //document.getElementById('filter-form').submit();
            $('#filter-form').trigger('submit');
        });

        $(document).on('click', '.custom-option',  function () {
            var select_data = $('.price-sel').val().split(',');
            $('.price').empty().html('<sup>$</sup>' + select_data[3]);

        });
        $(".content-landing .content-inner .section2 .gallery .gallery-item").click(function () {
            var pictr = $(this).children().attr("src");
            $("#ex1 .image img").attr("src", pictr);
        })
    });
</script>
<script>
    $(document).ready(function () {
        $('.dropdown > li').click(function () {

        });

        $(document).on('click', '.gallery-item', function(){
            var artid = $(this).attr('data-art-id');
            var userid = $(this).attr('data-user-id');
            $.ajax({
                url: '/ajax/get-modal-art-info?user-id=' + userid + '&art-id=' + artid
            }).done(function(data){
                $('#ex1').empty();
                $('#ex1').html(data);
                var w_size = $(document).width();
                if (w_size > 1280) {
                    $(".modalcustom-select").each(function() {
                        var classes = $(this).attr("class"),
                                id      = $(this).attr("id"),
                                name    = $(this).attr("name");
                        var template =  '<div class="' + classes + '">';
                        template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
                        template += '<div class="custom-options">';
                        $(this).find("option").each(function() {
                            template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
                        });
                        template += '</div></div>';

                        $(this).wrap('<div class="custom-select-wrapper"></div>');
                        $(this).hide();
                        $(this).after(template);
                    });

                    $(".custom-option:first-of-type").hover(function() {
                        $(this).parents(".custom-options").addClass("option-hover");
                    }, function() {
                        $(this).parents(".custom-options").removeClass("option-hover");
                    });
                    $(".custom-select-trigger").on("click", function() {
                        $('html').one('click',function() {
                            $(".modalcustom-select").removeClass("opened");
                        });
                        $(this).parents(".modalcustom-select").toggleClass("opened");
                        event.stopPropagation();
                    });
                    $(".custom-option").on("click", function() {
                        $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
                        $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
                        $(this).addClass("selection");
                        $(this).parents(".modalcustom-select").removeClass("opened");
                        $(this).parents(".modalcustom-select").find(".custom-select-trigger").text($(this).text());
                    });
                }
                else {
                    $('.select-main').toggleClass('changed');
                }
            });
        });

        /*$(document).on('click', 'load-more-gallery', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];

            getArtworks(page)
        });


        function getArtworks(page) {
            $.ajax({
                url: '/ajax/more-artworks/?page=' + page
            }).done(function (data) {
                
            });
        }*/
    });
</script>
<!--	gallery   -->
<script src="{{ asset('js/jquery.modal.js') }}" type="text/javascript" charset="utf-8"></script>
<!--	gallery - end  -- >
    <!--	select   -->
<script>
    var w_size = $(document).width();
    if (w_size > 1280) {
        $(".custom-select").each(function() {
            var classes = $(this).attr("class"),
                    id      = $(this).attr("id"),
                    name    = $(this).attr("name");
            var template =  '<div class="' + classes + '">';
            template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
            template += '<div class="custom-options">';
            $(this).find("option").each(function() {
                template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
            });
            template += '</div></div>';

            $(this).wrap('<div class="custom-select-wrapper"></div>');
            $(this).hide();
            $(this).after(template);
        });

        $(".custom-option:first-of-type").hover(function() {
            $(this).parents(".custom-options").addClass("option-hover");
        }, function() {
            $(this).parents(".custom-options").removeClass("option-hover");
        });
        $(".custom-select-trigger").on("click", function() {
            $('html').one('click',function() {
                $(".custom-select").removeClass("opened");
                $(".modalcustom-select").removeClass("opened");
            });
            $(this).parents(".custom-select").toggleClass("opened");
            $(this).parents(".modalcustom-select").toggleClass("opened");
            event.stopPropagation();
        });
        $(".custom-option").on("click", function() {
            $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
            $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
            $(this).addClass("selection");
            $(this).parents(".custom-select").removeClass("opened");
            $(this).parents(".modalcustom-select").removeClass("opened");
            $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
            $(this).parents(".modalcustom-select").find(".custom-select-trigger").text($(this).text());
        });
    }
    else {
        $('.select-main').toggleClass('changed');
    }
</script>
<!--	select - end   -->

</body>

</html>