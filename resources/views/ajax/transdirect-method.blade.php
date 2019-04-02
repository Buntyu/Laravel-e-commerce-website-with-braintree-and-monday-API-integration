
<div class="radio_title">Transdirect delivery method:</div>

<div class="radio_item method_cpdps">
    <input type="radio" id="tdmid1" name="tdm" value="couriers_please_domestic_proirity_signature^{{$quote->couriers_please_domestic_proirity_signature->total}}" />
    <label for="tdmid1"> <span></span> Couriers please domestic proirity signature <b>({{$quote->couriers_please_domestic_proirity_signature->total}} - {{$quote->couriers_please_domestic_proirity_signature->transit_time}})</b></label>
</div>
<div class="radio_item method_a">
    <input type="radio" id="tdmid2"   name="tdm" value="allied^{{$quote->allied->total}}" />
    <label for="tdmid2"> <span></span> Allied <b>({{$quote->allied->total}} - {{$quote->allied->transit_time}})</b></label>
</div>
<div class="radio_item method_n">
    <input type="radio" id="tdmid3"   name="tdm" value="northline^{{$quote->northline->total}}"/>
    <label for="tdmid3"> <span></span> Northline <b>({{$quote->northline->total}} - {{$quote->northline->transit_time}})</b></label>
</div>
