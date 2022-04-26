<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

function notifymax(){
    // $guests = DB::select('SELECT DISTINCT(i.conseil_id) as idc,fichier,objet, i.id as idi, com_nom, com_prenom,com_num_mat, theme,email,g.designation as designation 
    // FROM invitations  i ,users  u,user_groupes  g,conseils  c ,profils  p
    // WHERE i.participant_id =:id AND i.participant_id=u.id AND u.id=p.user_id AND c.statut=NULL AND u.usergroup_id=g.id', array("id"=>Auth::id(),));
  
    $guests = DB::select(
        'SELECT DISTINCT invitations.conseil_id as idc,fichier, objet,
            
            profiles.com_fullname as fullname,
            profiles.com_givenName as firstname,
            profiles.com_registrationNumber as regist_num,
            services.name as services_name,
            user_groups.name as user_groups_name
            FROM invitations ,user_groups ,profiles ,
                user_user_group__position__service__maps  maps,
                positions,services,conseils
            WHERE  invitations.participant_id=:id
            AND invitations.conseil_id=conseils.id 
            AND invitations.participant_id=profiles.userId
            AND invitations.participant_id=maps.userId
            AND maps.userGroupId=user_groups.id
            AND maps.serviceId=services.id
            AND maps.positionId=positions.id',
        array("id" => Auth::id(),)
    );
    
 return $guests;
}

function allowsUser(){
    return Gate::allows("yesadmin");
}