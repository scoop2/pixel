<?php
    if ($active == 'skills') {
        $skills = 'nav_skills_item_active';
    }else{
        $skills = 'nav_skills_item';
    }
    if ($active == 'vita') {
        $vita = 'nav_skills_item_active';
     }else{
        $vita = 'nav_skills_item';
     }
    if ($active == 'person') {
        $person = 'nav_skills_item_active';
     }else{
        $person = 'nav_skills_item';
     }
?>
<div class="nav_skills_wrap z-depth-1">
    <div class="nav_skills_item <?php echo $skills ?>"><a href="/skills">Skills</a></div>
    <div class="nav_skills_item <?php echo $vita ?>"><a href="/skills/vita">Vita</a></div>
    <div class="nav_skills_item <?php echo $person ?>"><a href="/skills/person">Personalien</a></div>
</div>
