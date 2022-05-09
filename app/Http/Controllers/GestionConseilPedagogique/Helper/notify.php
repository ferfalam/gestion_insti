<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

function notifymax(){
 
    $guests = DB::select(
        'SELECT DISTINCT invitations.conseil_id as idc,fichier, objet,
            
            profiles.com_fullname as fullname,
            profiles.com_givenName as firstname,
            profiles.com_registrationNumber as regist_num,
            services.name as services_name,
            user_groups.name as user_groups_name
            FROM invitations ,user_groups ,profiles ,users,
                user_user_group__position__service__maps  maps,
                positions,services,conseils
            WHERE  invitations.participant_id=:id
            AND invitations.conseil_id=conseils.id 
            AND invitations.participant_id=profiles.user_id
            AND invitations.participant_id=maps.userId
            AND invitations.participant_id=users.id
            AND users.user_groupId=user_groups.id
            AND maps.serviceId=services.id
            AND maps.positionId=positions.id',
        array("id" => Auth::id(),)
    );
    
 return $guests != NULL ? $guests : [];
    
}

function allowsUser(){
    return Gate::allows("yesadmin");
}