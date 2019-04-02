@extends('orders/main_orders')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/hints.css') }}">
@stop
@section('active5')
    class="active"
@stop
@section('content')
    <style>
        .transdirect_method{
            display: none;
        }
    </style>
    <div class="content-00 content-05-delivery">
        <div class="content-inner">
            @include('orders/breadcrumbs')
             <a href="{{url('orders/step-4')}}" class="next-step back-step "><i></i> step back </a>
            <div class="inner_05">
                <div class="left-side">
                    <form class="accord_item active" action="" id="form1">
                        {{csrf_field()}}
                        <div class="title-frame-float contact-info"><span>1</span> Contact information </div>
                        <button class="accord_edit" type="button">Edit</button>
                        <div class="form-inner">
                            <div class="label">
                                <label for="name">Name</label>
                                <label for="email">Email</label>
                                <label for="phone">Phone</label>
                                <label for="address">Address</label>
                                <label for="suburb">Suburb</label>
                                <label for="state">State</label>
                                <label for="postcode">Postcode</label>
                            </div>
                            <div class="input" style="width: 260px;">
                                <input type="text" id="name" placeholder="First and Last name" value="@if(isset($contactInfo['name'])) {{$contactInfo['name']}} @endif" name="name">
                                <input type="email" id="email" placeholder="For receipt and delivery tracking" value="@if(isset($contactInfo['email'])) {{$contactInfo['email']}} @endif" name="email">
                                <input type="tel" id="phone" placeholder="For delivery agent" value="@if(isset($contactInfo['phone'])) {{$contactInfo['phone']}} @endif" name="phone" style="margin-bottom: 30px;">
                                <input type="text" id="address" placeholder="For delivery agent" value="@if(isset($contactInfo['address'])) {{$contactInfo['address']}} @endif" name="address">
                                <input type="text" id="suburb" placeholder="For delivery agent" value="@if(isset($contactInfo['country'])) {{$contactInfo['country']}} @endif" name="country">
                                <input type="text" id="state" placeholder="For delivery agent" value="@if(isset($contactInfo['city'])) {{$contactInfo['city']}} @endif" name="city">
                                <input type="text" id="postcode" placeholder="For delivery agent" value="@if(isset($contactInfo['postcode'])) {{$contactInfo['postcode']}} @endif" name="postcode">
                            </div>
                            <button type="button" class="next_accord">Next</button>
                        </div>
                    </form>
                    {{--<form class="accord_item" action="{{url('orders/payment-request')}}" method="post" id="form2">--}}
                    <form class="accord_item" id="form2">
                        {{--{{csrf_field()}}--}}
                        <div class="title-frame-float pay-delivery-info"><span>2</span> Payment &amp; Delivery info </div>
                        <button class="accord_edit" type="button">Edit</button>
                        <div class="form-inner">

                        </div>
                        <div class="radio_group delivery_method">
                            <div class="radio_title">Delivery method:</div>
                            <div class="radio_item standard_delivery">
                                <input type="radio" class="delivery_check_method" id="r1" name="delivery_method" value="free_delivery" checked />
                                <label for="r1"> <span></span> Standard Delivery 5-10 Business Days <b>(free)</b></label>
                            </div>
                            <div class="radio_item priority_delivery">
                                <input type="radio" class="delivery_check_method" id="r2" name="delivery_method" value="transdirect_delivery"/>
                                <label for="r2"> <span></span> Transdirect Delivery Services <b>(Select - Transdirect delivery method) </b></label>
                            </div>
                            <div class="radio_item">
                                <input type="radio" class="delivery_check_method" id="r3" name="delivery_method" value="pick_up" />
                                <label for="r3"> <span></span> Pick up 5-10 Business Days </label>
                            </div>
                        </div>
                        <div class="radio_group delivery_method transdirect_method">

                        </div>
                        <div class="read">
                            Please read <a href="#" class="shipping">Shipping Policy</a>
                        </div>
                        <div class="radio_group" id="paymentBraintree">
                            <div class="radio_title">Payment method:</div>
                            <div id="dropin-container"></div>
                        </div>
                        <a class="notes">
                            Add notes to order
                        </a>
                        <textarea name="notes"></textarea>
                        <input type="hidden" name="payment_method_nonce" id="payMethodB">
                        <button type="button" class="next_accord">Next</button>
                    </form>

                </div>
                <div class="right-side">
                    <div class="title-frame-float">Order information </div>
                    <form class="card_wrap" id="form3">
                        @foreach($images as $key => $image)
                            <div class="card_item">
                                <div class="card_pict">
                                    <img src="@if(isset($img['src_size_img'])) {{asset('assets/upload')}}/{{$image['src_size_img']}} @else {{asset('assets/upload/' . $image['name'])}} @endif" alt="">
                                    <div class="card_pict_control">
                                        <span class="minus btn" attr-id="{{$key}}"><i></i></span>
                                        <input type="text" attr-id="{{$key}}" value="{{$image['count']}}" class="item-count" name="number_items"/>
                                        <span class="plus btn" attr-id="{{$key}}"><i></i></span>
                                    </div>
                                </div>
                                <div class="card_info">
                                    <div class="card_item_name">{{$image['name']}}</div>
                                    <div class="card_item_size">size {{$image['size']}}</div>
                                    <div class="card_item_price">Price: $@php
                                            $toPay = App\Models\Order::getTotalPriceItem($key);
                                            echo number_format($toPay, 2, '.', '');
                                        @endphp</div>
                                    <div class="card_addition">

                             @if(isset($image['border']) && $image['border'] != 'none')<div class="pic_frame card_addition_item"><span>frame float {{$image['border']}}</span> <span>${{$image['border_price']}}</span></div>@endif
                                        @if(isset($image['subject_removal']))<div class="pic_style card_addition_item"><span>subject removal</span>  <span>$25</span> </div>@endif
                                    </div>
                                </div>
                                <div class="card_del">
                                    <img src="{{asset('img/close.png')}}" alt="" attr-id="{{$key}}">
                                </div>
                            </div>
                        @endforeach

                        <div class="card_invoice">
                            <div class="total">Total amount: <span>$<span class="global-total-price">@php
                                        echo number_format(App\Models\Order::getGlobalTotalPrice(), 2, '.', '');
                                    @endphp </span></span></div>
                            @if(Session::has('discount-code'))<div class="discount">Discount: <span>-${{Session::get('discount-code')}}</span></div>@endif
                            <div class="discount apply-discount" style="display: none;">Discount: <span class="apply-discount-data">-$</span></div>
                            <div class="tax">Tax: <span>GST  (10% Included)<span class="new-tax">@php
                                        $toPay = App\Models\Order::getGlobalTotalPrice() * 0.1;
                                        echo number_format($toPay, 2, '.', '');
                                    @endphp</span></span></div>
                            <div class="to_pay">To pay: <span>$<span class="global-total-price-to-pay">@php
                                        $toPay = App\Models\Order::getGlobalTotalPrice();
                                        echo number_format($toPay, 2, '.', '');

                                        @endphp</span></span></div>
                            {{--<button class="conf_order" type="submit" id="submit-button" form="form2">Confirm Order</button>--}}
                            <button class="conf_order" type="button" id="submit-button" form="form2">Confirm Order</button>
                            @if(!Session::has('discount-code'))<a class="have_discount">I have discount code</a> @endif
                            <a class="cansel_discount">Cancel discount</a>
                            <input type="text" placeholder="Discount code" autocomplete="off" form="form2" id="discount-code" name="discount">
                            <button class="conf_discount" type="button" >Confirm</button>
                        </div>
                    </form>
                    <div class="after_card">
                        If you need more items you can <a href="/gallery">continue shopping.</a>
                    </div>
                </div>
                <div class="bottom-side">
                    Please refer to our <a href="#" class="terms">Terms and Conditions</a> for additional delivery information. Any questions? Contact our <a href="/#5thPage">Customer Service Team</a>
                </div>
            </div>

            </div>


        </div>
    </div>
@stop

@section('modal')

@stop

@section('scripts')
    @if($open_modal == true)
    <!--модалка -->
    <div class="hint_wrapper">
        <div class="hint_background"></div>
        <div class="hint_outside">
            <button class="hint_close"></button>
            <div class="hint_body">
                <p class="hello">Step 5 - Complete your order!</p>
                <p>Enter delivery details and make a payment or continue shopping.</p>
                <a class="ok">OK</a>
            </div>
        </div>
    </div>

    <!--модалка - кінець-->
    @endif
    <div class="hint_wrapper artworks_overview message message_promo">
        <div class="hint_background"></div>
        <div class="hint_outside">
            <button class="hint_close"></button>
            <div class="hint_body">
                <p class="title">Incorrect discount promo code!</p>
            </div>
        </div>
    </div>

    <div class="hint_wrapper artworks_overview message message_form" style="display:none;">
        <div class="hint_background"></div>
        <div class="hint_outside">
            <button class="hint_close"></button>
            <div class="hint_body">
                <p class="title">Please add information to all fields!</p>
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
    <div class="hint_wrapper artworks_overview" id="shipping" style="display:none;">
        <div class="hint_background"></div>
        <div class="hint_outside">
            <button class="hint_close"></button>
            <div class="hint_body_out">
                <div class="hint_body">
                    <p class="title">SHIPPING POLICY</p><br>

                    <p>We offer free standard delivery across Australia to our customers. Once your order has been placed,
                        you can expect to receive your canvas in 5 to 10 business days. Discounted and custom size prints
                        may, or may not include free shipping.
                    </p><br>

                    <p>As part of our commitment to providing a fast turnaround, we offer a flat express shipping rate of $45
                        for all standard print orders within Australia. Our express delivery service is 3 to 6 business days
                        once your order has been received.
                    </p><br>

                    <p>We can not guarantee that all our print sizes will be available to locations outside of our national
                        regional network. You will be informed if there are any issue with your location.
                    </p><br>

                    <p>As per our terms and conditions, occasionally shipping delays occur due to reasons beyond our
                        control. If shipping is delayed we’ll do everything possible to ensure your delivery arrives quickly, but
                        we will not be liable for late arrivals.
                    </p><br>

                    <p>You the customer accept that if you are working to any deadlines, Canvas Print Studio are not liable
                        for any missed deadlines or lost business because of shipping delays.
                    </p><br>

                    <p>If an order is lost or damaged in transit, we guarantee a replacement. Please note that we will
                        require proof of damage for insurance purposes.
                    </p><br>

                    <p>If you have any additional questions about shipping or delivery please email us at
                        <a href="http://canvasprintstudio.com.au/">print@canvasprintstudio.com.au</a> and we'll be happy to answer your queries.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="hint_wrapper error-free-delivery" style="display:none">
        <div class="hint_background"></div>
        <div class="hint_outside">
            <button class="hint_close"></button>
            <div class="hint_body">
                <p class="hello">Free delivery disabled!</p>
                <p>Please select other method.</p>
                <a class="ok">OK</a>
            </div>
        </div>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/additional-methods.js"></script>
    <script src="{{ asset('js/hints.js') }}"></script>
    <!--<script src="https://js.braintreegateway.com/js/braintree-2.31.0.min.js"></script>-->
    <script src="https://js.braintreegateway.com/web/dropin/1.8.0/js/dropin.min.js"></script>
    <script>

        $(document).ready(function () {
            $(document).on('click', '.delivery_check_method', function(){
                // if('transdirect_delivery' == $('.delivery_check_method:checked').val()){
                //     $.ajax({
                //         type: 'GET',
                //         url: '/orders/get-transdirect-method/',
                //         data: $('#form1').serialize() +'&'+ $('#form2').serialize() + '&' + $('#form3').serialize(),
                //         success: function(data){
                //             $('.transdirect_method').empty().append(data);
                //             alert('ok');
                //         }
                //     });
                //     $('.transdirect_method').show();
                // }else{
                //     $('.transdirect_method').hide();
                // }
                if('free_delivery' == $('.delivery_check_method:checked').val()){
                    $.ajax({
                        type: 'GET',
                        url: '/orders/check-free-delivery/',
                        success: function(data){
                            if(data == 'error'){
                                $('.error-free-delivery').show();
                            }
                            //$('.transdirect_method').empty().append(data);
                        }
                    });
                }
            });


            $('.minus').click(function () {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                var id = $input.attr('attr-id');
                var count1 = count;
                $.ajax({
                    type: 'GET',
                    url: '/orders/step-5/change-count/'+id+'/'+count1,
                    data: 'id='+id+'&count='+count1,
                    success: function(data){
                        $('.global-total-price').empty().append(data);
                        var tp = parseFloat(data) + data*0.1;
                        var tax = data*0.1;
                        $('.global-total-price-to-pay').empty().append(tp.toFixed(2));
                        $('.new-tax').empty().append(tax.toFixed(2));
                    }
                });
                return false;
            });
            $('.plus').click(function () {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                var id = $input.attr('attr-id');
                var count1 = parseInt($input.val());

                $.ajax({
                    type: 'GET',
                    url: '/orders/step-5/change-count/'+id+'/'+count1,
                    data: 'id='+id+'&count='+count1,
                    success: function(data){
                        $('.global-total-price').empty().append(data);
                        var tp = parseFloat(data) + data*0.1;
                        var tax = data*0.1;
                        $('.global-total-price-to-pay').empty().append(tp.toFixed(2));
                        $('.new-tax').empty().append(tax.toFixed(2));
                    }
                });
                return false;
            });
        });


        $(".card_item .card_del img").click(function () {
            var id = $(this).attr('attr-id');
            $.ajax({
                type: 'GET',
                url: '/orders/step-5/delete-item/'+id+'/',
                data: 'id='+id,
                success: function(data){
                    if(data == 'redirect'){
                        document.location.href="step-1";

                    }
                    $('.global-total-price').empty().append(data);
                    var tp = parseFloat(data) + data*0.1;
                    var tax = data*0.1;
                    $('.global-total-price-to-pay').empty().append(tp.toFixed(2));
                    $('.new-tax').empty().append(tax.toFixed(2));
                }
            });
            $(this).parents(".card_item").remove();
        });
        $(".notes").click(function () {
            $(".content-05-delivery textarea").fadeToggle(500);
        });
    </script>



    <script>
        jQuery(function ($) {
            $('input[type=radio]').change(function() {

                if(this.value == 'pick_up'){
                    $('#paymentBraintree').hide();
                }else{
                    $('#paymentBraintree').show();
                }
            });

            $.ajax({
                url: "/orders/get-token/",
                type: "get",
                dataType: "json",
                success: function (data) {
                    var button = document.querySelector('#submit-button');
                    /*braintree.setup(data, 'dropin', {
                        container: 'dropin-container',

                    });*/
                    braintree.dropin.create({
                        authorization: data,
                        container: '#dropin-container',
                        paypal: {
                            flow: 'checkout',
                            amount: '10.00',
                            currency: 'AUD'
                        }
                    }, function (createErr, instance) {
                        button.addEventListener('click', function (e) {
                            e.preventDefault();
                            if($('input[name=rr]:checked').val() == 'pick_up'){
                                // document.querySelector('#form2').submit();
                            }else{
                                instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
                                    // Submit payload.noe to your server
                                    document.querySelector('#payMethodB').value = payload.nonce;
                                    // document.querySelector('#form2').submit();
                                });
                            }
                        });
                    });
                }
            });
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
        $(".delivery_method .radio_item input[type='radio']").click(function () {
            $(".radio_item b").fadeOut(100);
        });

        $(".standard_delivery input[type='radio']").click(function () {
            if ($(".standard_delivery input[type='radio']").prop('checked') == true) {
                $(".standard_delivery b").fadeIn(100);
            }
            else {}
        });
        $(".priority_delivery input[type='radio']").click(function () {
            if ($(".priority_delivery input[type='radio']").prop('checked') == true) {
                $(".priority_delivery b").fadeIn(100);
            }
            else {}
        });
        $(document).on('click', ".method_cpdps input[type='radio']", function(){
            if ($(".method_cpdps input[type='radio']").prop('checked') == true) {
                $(".method_cpdps b").fadeIn(100);
                $(".method_a b").fadeOut();
                $(".method_n b").fadeOut();
            }
            else {}
        });
        $(document).on('click', ".method_a input[type='radio']", function(){
            if ($(".method_a input[type='radio']").prop('checked') == true) {
                $(".method_a b").fadeIn(100);
                $(".method_n b").fadeOut();
                $(".method_cpdps b").fadeOut();
            }
            else {}
        });
        $(document).on('click', ".method_n input[type='radio']", function(){
            if ($(".method_n input[type='radio']").prop('checked') == true) {
                $(".method_n b").fadeIn(100);
                $(".method_a b").fadeOut();
                $(".method_cpdps b").fadeOut();
            }
            else {}
        });
    </script>

    <script>
        $(document).ready(function () {

            $('#form1').validate({
                // rules
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true
                    },
                    phone: {
                        required: true
                    }
                },
                messages: {
                    name: "",
                    email: "",
                    phone: ""
                }

            });


            $('#form2').validate({
                // rules,
                rules: {
                    address: {
                        required: true
                    },
                    suburb: {
                        required: true
                    },
                    state: {
                        required: true
                    },
                    postcode: {
                        required: true
                    },
                    rr: {
                        required: true
                    },
                    rr1: {
                        required: true
                    },
                    notes: {
                        required: false
                    }
                },
                messages: {
                    address: "",
                    suburb: "",
                    state: "",
                    postcode: "",
                    rr: "",
                    rr1: "",
                    notes: ""
                }
            });

            $('#form3').validate({
//                // rules
                rules: {
                    number_items: {
                        required: true
                    },
                    discount: {
                        required: false
                    }
                },
                submitHandler: function (form) {
                    // serialize and join data for all forms
                    // ajax submit
//                    alert('go ajax');
                    return false;
                }
            });

//            form1
            @if(isset($contactInfo['name']) && isset($contactInfo['email']) && isset($contactInfo['phone']) && isset($contactInfo['country']) && isset($contactInfo['city']) && isset($contactInfo['postcode']) && isset($contactInfo['address']))
            $("#form1 input").css("box-shadow", "inset 0 0 0 50px #fff");
            $(".accord_item").removeClass("active");
            $(".accord_item").css("opacity", "1");
            $('.contact-info').parents(".accord_item").children(".title-frame-float").addClass("success");
            $("#form1 .accord_edit").css({
                "visibility": "visible",
                "opacity": "1"
            });
            if( $("#form2 .title-frame-float").hasClass("success") ) {
                $("#form2 .accord_edit").css({
                    "visibility": "visible",
                    "opacity": "1"
                });
            }
            else {
                $('#form2').addClass("active");
            }
            @endif
            $('#form1 .next_accord').on('click', function () {
                if ($('#form1').valid()) {
                    // $.ajax({
                    //     url: "/orders/contact-info/",
                    //     type: "GET",
                    //     data: $('#form1').serialize(),
                    //     success: function (data) {
                    //         //alert(data);
                    //     }
                    // });
                    $("#form1 input").css("box-shadow", "inset 0 0 0 50px #fff");
                    $(".accord_item").removeClass("active");
                    $(".accord_item").css("opacity", "1");
                    $(this).parents(".accord_item").children(".title-frame-float").addClass("success");
                    $("#form1 .accord_edit").css({
                        "visibility": "visible",
                        "opacity": "1"
                    });
                    if( $("#form2 .title-frame-float").hasClass("success") ) {
                        $("#form2 .accord_edit").css({
                            "visibility": "visible",
                            "opacity": "1"
                        });
                    }
                    else {
                        $('#form2').addClass("active");
                    }
                }
                else {
//                    alert(1);
                    if( $("#form1 input").hasClass("error") ) {
                        $("#form1 input.error").css("box-shadow", "red 0px 5px 7px -3px");
                    }
                    $("#form1 input").click(function(){
                        $(this).css("box-shadow", "inset 0 0 0 50px #fff");
                    })
                }
            });
            $('#form1 .accord_edit').on('click', function () {
                $(".accord_item").removeClass("active");
                $(this).prev(".title-frame-float").removeClass("success");
                $("#form2 .accord_edit").css({
                    "visibility": "hidden",
                    "opacity": "0"
                });
                $('#form1').addClass("active");
            });

//            form2

            $('#form2 .next_accord').on('click', function () {
                if ($('#form2').valid()) {
                    // $.ajax({
                    //     url: "/orders/payment-info/",
                    //     type: "GET",
                    //     data: $('#form2').serialize(),
                    //     success: function (data) {
                    //         //alert(data);
                    //     }
                    // });
                    $("#form2 input").css("box-shadow", "inset 0 0 0 50px #fff");
                    $(".accord_item").removeClass("active");
                    $(".accord_item").css("opacity", "1");
                    $(this).parents(".accord_item").children(".title-frame-float").addClass("success");
                    $("#form2 .accord_edit").css({
                        "visibility": "visible",
                        "opacity": "1"
                    });
                    $("#form1 .accord_edit").css({
                        "visibility": "visible",
                        "opacity": "1"
                    });
                }
                else {
//                    alert(2);
                    if( $("#form2 input").hasClass("error") ) {
                        $("#form2 input.error").css("box-shadow", "red 0px 5px 7px -3px");
                    }
                    $("#form2 input").click(function(){
                        $(this).css("box-shadow", "inset 0 0 0 50px #fff");
                    })
                }
            });
            $('#form2 .accord_edit').on('click', function () {
                $(".accord_item").removeClass("active");
                $(this).prev(".title-frame-float").removeClass("success");
                $("#form1 .accord_edit").css({
                    "visibility": "hidden",
                    "opacity": "0"
                });
                $('#form2').addClass("active");
            });

//            form3
            $(".card_invoice .have_discount").click(function () {
                $(".card_invoice input").css("display", "block");
                $(".card_invoice .conf_discount").css("display", "block");
                $(".card_invoice .cansel_discount").css("display", "block");
                $(".card_invoice .have_discount").css("display", "none");
            });
            $(".card_invoice .conf_discount").click(function () {
                if( $(".card_invoice input").val() == "" ) {
                    $(".card_invoice input").css("box-shadow", "red 0px 5px 7px -3px");
                } else {
                    var code = $('#discount-code').val();
                    $.ajax({
                        type: 'GET',
                        url: '/orders/step-5/confirm-discount-code/'+code+'/',
                        data: 'code='+code,
                        success: function(data){
                            if(data == 'false'){
                                $('.message_promo').show();
                                $(".card_invoice input").css("display", "block");
                                $(".card_invoice .conf_discount").css("display", "block");
                                $(".card_invoice .cansel_discount").css("display", "block");
                                //$(".card_invoice .have_discount").css("display", "block");
                            }else{
                                var str_json = JSON.parse(data);
                                var data1 = str_json[0];
                                $('.global-total-price').empty().append(data1);
                                var tp = parseFloat(data1) + data1*0.1;
                                var tax = data1*0.1;
                                $('.global-total-price-to-pay').empty().append(tp.toFixed(2));
                                $('.new-tax').empty().append(tax.toFixed(2));
                                $('.apply-discount-data').html('-$' + str_json[1]);
                                $('.apply-discount').show();
                            }

                        }
                    });
                    $(".cansel_discount").css("display", "none");
                    $(".card_invoice .have_discount").css("display", "none");
                    $(".card_invoice input").css("display", "none");
                    $(".card_invoice .conf_discount").css("display", "none");
                }
            });
            $(".card_invoice .cansel_discount").click(function () {
                $(".card_invoice .cansel_discount").css("display", "none");
                $(".card_invoice .have_discount").css("display", "block");
                $(".card_invoice input").val("");
                $(".card_invoice input").css("display", "none");
                $(".card_invoice .conf_discount").css("display", "none");
            });
            $(".card_invoice input").click(function(){
                $(this).css("box-shadow", "none");
            })

            $('#submit-button').on('click', function (e) {
                e.preventDefault();
                if ( ($('#form1').valid()) && ($('#form2').valid()) && ($('#form3').valid()) ) {
                    console.log('formserialize: ',$('#form1').serialize());
                    $.ajax({
                        type: 'POST',
                        url: '/orders/payment-request',
                        data: $('#form1').serialize() +'&'+ $('#form2').serialize() + '&' + $('#form3').serialize(),
                        // data: {
                        //     'contactInfo': $('#form1').serialize(),
                        //     'deliveryInfo': $('#form2').serialize(),
                        //     'orderInfo': $('#form1').serialize(),
                        // },
                        success: function(){
                            console.log("all ok");
                        },
                        error: function(){
                            console.log("not ok");
                        },
                    });
                } else {
//                    alert("no valid forms");
                    $(".message_form").show(0);
                    return false;
                }

            })



        });
    </script>
    <!--	select - end   -->
@stop