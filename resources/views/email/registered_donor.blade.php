@component('mail::message')
Dear {{ Auth::user()->name }},
<h1>Who are the blood donors?</h1>
<p>Most blood donors are volunteers. However, sometimes, a patient may want to donate blood a couple of weeks before
undergoing surgery, so that his or her blood is available in case of a blood transfusion. Donating blood for yourself is
called an autologous donation. Volunteer blood donors must pass certain criteria, including the following:</p>
<ul>    
    <li>Must be at least 16 years of age, or in accordance with state law</li>    
    <li>Must be in good health</li>    
    <li>Must weigh at least 110 pounds</li>    
    <li>Must pass the physical and health history exam given before donation</li>
</ul>
<h1>What tests are done in blood banking?</h1>
<p>A certain set of standard tests are done in the lab once blood is donated, including, but not limited to, the following:</p>
<ul> 
    <li>Typing: ABO group (blood type)</li>    
    <li>Rh typing (positive or negative antigen)</li>    
    <li>Screening for any unexpected red blood cell antibodies that may cause problems in the recipient</li>
    <li>Screening for current or past infections, including: 
        <ul>
            <li>Hepatitis viruses B and C</li>
            <li>Human immunodeficiency virus (HIV)</li>
            <li>Human T-lymphotropic viruses (HTLV) I and II</li>
            <li>Syphilis</li>
            <li>West Nile virus</li>
            <li>Chagas disease</li>
        </ul>        
    </li>
    <li>Irradiation to blood cells is performed to disable any T-lymphocytes present in the donated blood. (T-lymphocytes can
    cause a reaction when transfused, but can also cause graft-versus-host problems with repeated exposure to foreign
    cells.)</li>    
    <li>Leukocyte-reduced blood has been filtered to remove the white blood cells that contain antibodies that can cause fevers
    in the recipient of the transfusion. (These antibodies, with repeated transfusions, may also increase a recipient's risk
    of reactions to subsequent transfusions.)</li>
</ul>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/dashboard/donor'])
View Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
