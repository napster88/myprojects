<?php
	if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
global $db;


$arrayval=array(
	//'56da938c-74de-463a-254a-5afab68d560a',
	'66b95672-b0d7-b3d8-18be-5afab6a979bf','
	76d691dc-be6e-dd7e-d423-5afab6842443','
	86b54b6f-4738-59a7-c9c3-5afab6203e4b','
	96940219-6cfd-c42c-b560-5afab660d7de','
	a6344ef1-3c0c-00cd-4002-5afab6a404b2','
	b612fb54-93cb-296e-b4af-5afab6df7307','
	c5f1b22a-5873-2256-e070-5afab6b57b9a','
	d5d07276-baa0-a59e-d728-5afab66ae81c','
	e5edb56a-78ae-3380-d83d-5afab6980795','
	1a86060e-3d44-8e23-b362-5afab6340b53','
	11872f9e-d63a-b1d3-6d2b-5afab6c2efe1','
	21a460a3-9afe-df41-ae72-5afab602c398','
	318314a9-2cb8-a122-eaec-5afab6b85622','
	4161d7f3-5104-d850-8f34-5afab6e42f69','
	517f181b-caf5-b8c5-1551-5afab6f227aa','
	619c5462-146f-5e46-b61d-5afab6692a46','
	71b99f28-b472-3cc1-d56b-5afab6ab1dc1','
	81d6c135-94a7-4fc7-1d82-5afab6bc8c30','
	91f405c1-b0d4-2e92-03d1-5afab6c7f6a0','
	a1d2cccf-782c-0647-f7f9-5afab6a67a50','
	b1b17f50-125e-5260-c8d3-5afab6082150','
	c19037be-9600-1938-800b-5afab608f2a7','
	1d3f0a1c-671c-3565-ea38-5afd0661cacb','
	352c63b9-e1c0-889b-26ee-5afd064c6f87','
	c9cb4d2-e6a7-28b1-b768-5afd0626cb70','
	5f698a8c-1779-37e4-8cab-5afd0683010f','
	7562ddb9-94f3-8d82-ce76-5afd064ee856','
	8f05b5aa-abd0-f934-2476-5afd066f592a','
	a6b48366-2c31-aa36-7766-5afd06063fc6','
	bda7e867-0c38-a6aa-859a-5afd06519323','
	d2a73ef1-18a7-b30d-10f3-5afd06b34151','
	e5b270ef-1122-35a5-147f-5afd063702ac','
	7c630384-647a-a70e-bfc5-5afd06a0a058','
	21692aa3-302d-f434-ec8b-5afd061f38dc','
	39950ed2-8319-4c5f-bb80-5afd06f46e90','
	4d9a5c68-dcca-aaab-dfb5-5afd06bb79a9','
	6410a2bf-70a7-9f9b-786d-5afd061bd2b5','
	785473a4-4374-46ac-35e7-5afd0677f928','
	917a510e-6635-2b14-b552-5afd062ff91e','
	a9a6234f-28b0-da01-1eb9-5afd060118f9','
	c2108d97-7bf7-4409-cee6-5afd064216f3','
	d692dd8c-f647-ea7f-7f32-5afd06516d16','
	ed0921bc-14bc-d212-64f4-5afd06a18eca','
	118e0fb0-fa06-fbcc-c11d-5afd065ec7ab','
	29b9e347-c540-c1bb-23e6-5afd0669ccf3','
	7464ee05-bd1e-4067-75b0-5afd3099eff8','
	8d0dc45f-9ab1-320b-f408-5afd302a51f5','
	a1ce897d-b39b-3cd3-637e-5afd3068da29','
	b97d659b-999f-05ca-c0cf-5afd307c06a8','
	d2e1c4f6-1bc0-bf4d-1ab6-5afd30493dd8','
	eb4c2ad9-e423-3994-b0e6-5afd30b3868a','
	e59f05c0-2683-8992-2cc5-5afd307f7707','
	258bd1bd-31b6-4702-6183-5afd30e55e9e','
	3fabbc80-7e3b-6167-7e15-5afd30de49bc','
	59101467-bd0a-34d9-09cc-5afd30e86ac4','
	713be7ac-12ee-70a6-a126-5afd304271c7','
	882f4056-8a55-3744-7f66-5afd30fa7392','
	9dea1b59-6baf-ecfb-bb23-5afd30c0081c','
	b3e36a9f-55bd-b664-5758-5afd30f5cd16','
	cb923cdf-eb1f-6971-6f48-5afd3008a5c2','
	e14d1a21-5dd6-9dd2-f013-5afd3096db3c','
	748f03e0-912c-8d8a-0426-5afd303c10e9','
	1cc54c1c-0364-19a9-4d5f-5afd303fcb86','
	32419e5c-0abd-71fa-a765-5afd3088ecc3','
	4b28f0dc-87b2-ce3d-35ab-5afd307d56b1','
	625acb57-409b-1794-a82b-5afd3010fc00','
	7b4221dc-3e64-22fc-fc14-5afd30d2adc1','
	92b27b0b-e09a-2ffc-9fcb-5afd307f3c33','
	a5280370-d8d6-dfe9-d4cf-5b0d1c9dd8bc','
	bc5995f0-d095-dac5-f83a-5b0d1cc58df9','
	d1b667a4-0549-d9dd-0746-5b0d1c43a832','
	ebf54668-a343-d279-900b-5b0d1c9c81dc','
	103b6c94-a57f-10b7-572e-5b0d1ceecb66','
	26d0b5c6-58a9-d45e-8efe-5b0d1ccfcf35','
	410f9282-cadc-d812-94be-5b0d1c1d74b4','
	5ab22919-1987-cde1-60df-5b0d1c63c82d','
	72800e8d-2dc0-6699-3b1d-5b0d1cfeffa0','
	88791ce5-75d5-7c49-ac0a-5b0d1cbd3e45','
	a17f7922-b4fd-eac8-2cc4-5b0d1cb2d9e9','
	cf466f3f-5606-d96d-4683-5b0d1c0fe610','
	e406fc4d-d6a8-a7f9-21dc-5b0d1c02ca78','
	40740d09-08db-d986-cbd5-5b0d1c4c2844','
	18c7dcfc-d8b6-f736-8357-5b0d1c200a83','
	2ff97217-6685-fcb9-7bd2-5b0d1c2eee1a','
	50ef14aa-c421-f27c-2a9b-5b0d1ccd35d1','
	66e823e5-5a20-f4ff-be1a-5b0d1c3dfe6c','
	7ce13c2f-6245-7d50-4efc-5b0d1c88414e','
	91a1d724-3c43-ac26-3f30-5b0d1c8de0ae','
	ab447972-689d-1c2e-b567-5b0d1c4856f5','
	c4e707df-3333-859e-e266-5b0d1c5051dd',
	'dd5122f3-2736-cb59-9822-5b0d1ca54961','



6aa880cf-c6b8-841f-3a7c-5afab6515bee','
7b04432d-5771-230d-4363-5afab6be8a65','
8ae30904-916f-a40d-f711-5afab6a689fe','
9b3ebd9f-c912-ffb5-8839-5afab60a3fe8','
ab1d70c3-6342-11ea-75ed-5afab6eda90e','
bb3abf4b-a43b-63ca-a4b3-5afab637c6c9','
cb57f4e6-dc9a-a4f7-16ec-5afab66101af','
dbb3b842-3d7d-3d14-5a2b-5afab6e048d5','
ebd0e4de-7c9f-0596-69b9-5afab63e5c9b','
1f3a8a51-4e09-3f6f-0823-5afab60f894e','
3013447d-13d2-2368-653f-5afab6c04fbd','
412a8310-b168-8022-e06c-5afab6e38e5f','
52804464-faf5-53e6-00d6-5afab64f156c','
63978f3a-5795-e615-63b0-5afab6e24da5','
74704c36-11d7-cac0-f865-5afab6398072','
85c601c1-3fb4-14c1-84e4-5afab6e6909a','
971bc942-9809-8d2b-2f1e-5afab6f44da7','
a8330e44-4cd4-3a86-6fda-5afab69a2263','
b90bc93c-66fb-a9be-918a-5afab6734ed5','
c9a60108-5fe9-9dc8-a0f1-5afab6faf9ce','
da7eb2de-cc4b-5517-0814-5afab65c6453','
eb18f3a2-bf6f-21a3-0b38-5afab666620a','
82239e38-679d-4ef7-6c41-5afab6518bc0','
6c6c5381-d04f-8a79-515c-5afab6a2b011','
7d451b31-a349-747d-c7ee-5afab680e610','
8e1dd226-12f2-d5bc-60dc-5afab6364a81','
7d872d04-ee6e-d039-0664-5afab6145a73','
8f59f0bf-6af3-389f-c25b-5afab63c3cd7','
61b559da-dba7-a9d1-b300-5afab6bb549c',
//'22bb0d51-83c0-eec0-8fae-5afab6f40a29',
'7adeb44d-cd1c-8e48-ec31-5afab6b7431d',
//'4d02d99f-414b-9cc0-f0bb-5afab6e1b0ae',
'7069d9c0-acbc-8605-0b6e-5afab68ff2e6','
823cac35-42a2-eac8-e0b8-5afab682de8a','
95096c4f-8aef-f118-5ed3-5afab6b0d41c','
a814a0bd-7ccd-2684-4fa5-5afab6cf7982','
3134995e-c615-e291-5caa-5afab6e82526','
42c8df84-3826-acdd-a84a-5afab66927ad','
53e01be2-fcfe-a208-f0b5-5afab65db632','
64b8d8ea-5b0c-97fe-3ab2-5afab6232d39','
760e9fe1-1cf8-598e-9f2c-5afab6dec43c','
8725db54-3f1f-243b-051f-5afab6dd3ef8','
987b97d0-b356-b4f4-38c4-5afab6520589','
a9d15510-a0be-286c-e341-5afab6b6b66f','
ccbb5b8a-7d26-d0d8-55b6-5afab6396fc2','
de1118ec-cb89-6ad8-49c0-5afab6ad1668','
ef66e50f-18cc-f376-f009-5afab6d19fb7','
c98a01e0-4fae-1a7a-009f-5afab6faac9f','
1e6b6d31-4385-d6b2-7429-5afab6d68c3c','
2fffa6d4-3a79-cec5-5b9e-5afab63465f4','
4116e369-454a-294f-a2e0-5afab6b1a7c2','
526ca8ea-311c-59d7-0cf9-5afab6507ce4','
6383e0fc-605c-47a4-d180-5afab677a2f7','
749b2644-ca58-a396-9912-5afab6201917','
85f0e122-baaf-ffd8-b25f-5afab6c356fb','
9746a15a-b6a5-66c4-09bb-5afab6699adf','
a8dae38c-dbf6-504f-62b4-5afab61e08fb','
b9f22ceb-7d9a-c1fd-c351-5afab6c75ded','
69e4260a-49eb-abd5-0a48-5afab61b4b69','
31108736-f03d-0803-6a36-5afd06c41943','
5245070d-3d13-cd75-fdbf-5afd069498e3','
708b746f-8b51-6eff-3cb7-5afd064c3089','
8a2e54d6-3c21-2027-42e0-5afd0615d3c3','
a315b898-0ede-382f-54c8-5afd06152fd1','
be6e2769-a649-74c0-8c68-5afd06aa91d5','
dc7618bc-84aa-c98b-5edf-5afd0665eae3','
5dd00a5a-87cf-524e-8a4f-5afd06f67898','
261770a8-d920-3022-8a3d-5afd061f8d93','
44daecd4-a3b2-7d90-1ec8-5afd068f55f2','
8d1ff892-85c9-e67a-950a-5afd068db404','
ac21f7ee-d99c-b741-11df-5afd06ede6cf','
c7b8de6c-9041-d8a3-6230-5afd0628d25a','
e15bbe00-120a-5852-51ce-5afd067d97f4','
33100b7e-579b-051b-2b33-5afd06a9df1c','
1cd3e5a9-095a-41cd-6d02-5afd06d852d3','
39e1dc75-98b0-366c-d0ff-5afd065cc83f','
524c3cca-b4be-3007-b9f6-5afd0615a6c5','
6c6c1e92-411e-4fb4-e14c-5afd06ac66d2','
81e8641c-efd2-47fc-5e7b-5afd06569024','
9997336a-5f4f-5aca-0c56-5afd0689eea8','
b2fb9d19-9e0b-2e00-0bb3-5afd0603186c','
3b8c0a13-17dd-ea65-dd8f-5afd0616df24','
4c7e6a77-f79e-1e65-4f64-5afd06b2db32','
66dcc9c6-ed7c-b658-fdea-5afd0676b696','
7aa392a6-7b1c-da17-6d18-5afd066360d7','
87f7e4b0-1a5e-9b31-11c4-5afd30496fa9','
9eacb60c-3d74-c585-2fd7-5afd304b7d75','
cfbffaa2-b3a7-0571-fd58-5afd3015fb97','
e92457ef-b26c-3442-4d67-5afd30c47acc','
ee1b075c-ca01-0ea0-ae50-5afd3066295a','
2940108f-de24-f797-bd45-5afd307bd0a4','
4459f424-2a4b-f5dc-ff33-5afd301a29a4','
5d02d515-71d7-1cae-b786-5afd309cfd5c','
779fb9f8-56b0-c976-0672-5afd3064391a','
91811a6d-f1d2-2534-90a1-5afd30ba4654','
a9acf358-70bb-5dd6-0ab7-5afd3017f547','
c63de641-17a8-9fbd-f28b-5afd3064003e','
e2904c66-cfaa-d84d-2b33-5afd309ff78c','
8cab041b-ccbe-c227-c72a-5afd30c75221','
21f08f67-1a85-e9c3-4028-5afd307a5753','
38a563eb-d96e-f422-e09d-5afd30db6afa','
5286c429-0f08-6f16-041d-5afd30f3220e','
6a35973a-96df-e9c2-f46c-5afd30c2a3a6','
8399fc39-b308-e520-00d6-5afd30125da5','
9b875afd-1e13-aade-c1bb-5afd300e1f69','
b27aaf2e-8e55-81fa-16d0-5afd301e0c9c','
cd179f6c-a145-ae10-73bd-5afd30e2ca17','
7404738e-f91b-510c-2003-5afd308f4987','
c2293af4-66ee-1696-7e17-5afd305b93dc','
d9998578-3ab8-0b74-0e7c-5afd304157fd','
ef15db11-7fb9-6caa-50cc-5afd3068f3ae','
6c7d9c24-917a-512d-8b19-5afd30370edb','
82f3e5c3-cf5c-59a1-c2c1-5afd309a8d9a','
a2b4f91c-9be6-ef1c-78a7-5afd30be0298','
c0fef97a-9e63-d8ae-66f6-5afd3107754f','
7225ebef-ad66-bcff-f431-5afd31e639ec','
b22c26e4-c620-ff43-b486-5afd31fa0b0c','
ee200dd0-608c-a4d9-e56e-5afd31d5b557','
1ef61d4f-2805-b9a1-b079-5afd31066f51','
3a0ff4b6-e579-e61c-f0a2-5afd31a2672b','
56df6cd3-38a1-2f29-fe17-5afd318bfbb8','
900850b5-5f77-d694-9ffa-5afd314fd180','
a8343369-f10f-a19f-37b6-5afd3134d228','
c38caedd-0e93-87d8-1096-5afd31a221a2','
dea68313-47ec-ed67-68fe-5afd3118fdab','
51f602f0-d92f-e88d-121b-5afd31a9c7ad','
1f3f3732-6c19-c1d3-2e82-5afd315a1154','
3e4136e3-fe1f-9bb0-e098-5afd31c5cad4','
5f75b542-e7fc-5531-34cf-5afd3150a4c5','
802d3577-9cb5-34ec-61c7-5afd3162e0cf','
9aca1379-5008-34ce-30e7-5afd31c441f3','
b3b178c8-7894-9dfe-75c8-5afd314d6246','
ce4e55af-805b-88f6-8485-5afd3143ae22','
ea23cde0-06a9-5a4d-10eb-5afd31baea7d','
16b73c4b-1715-3ef6-5725-5afd31277ba5','
2de9109a-4623-b06c-7108-5afd3124b47a','
4808f6be-266d-619c-34d4-5afd3122eb8c','
61ea51ac-054d-6cce-e9bc-5afd31ef647b','
9fee4afc-5dd3-658b-e48b-5afd31032200','
bb46a74b-b43b-b073-ebdf-5afd31c3c501','
d6dd8c5b-4f52-41bf-ff89-5afd31368cfc','
f0bee31b-c9a4-49e2-5749-5afd313ecec4','
16f95125-176e-8fc5-cbc1-5afd314e5a1f','
6986a4c8-b6cd-b019-63ce-5afd316f966c','
5ddf03f1-f92f-c7b9-7979-5b0d1ce76451','
1b3ac002-bb90-3f33-a575-5b0d1c8124b2','
4d4788a2-84f6-e1df-0f8f-5b0d1c6c2c4a','
62a4582a-37a4-a57e-d1f4-5b0d1c740444','
82fdbd76-9561-c0be-7ffd-5b0d1cb5b339','
98f6cafc-dd77-3857-05a1-5b0d1ca7d1d3','
bd95f5e3-4ab3-9b97-bc20-5b0d1cbf929f','
d8ee1f4a-3e5d-2c17-4903-5b0d1c65134e','
f0bbfedc-080b-a85b-25d2-5b0d1c78441f','
163a8d2c-0692-dbd1-a213-5b0d1c853632','
2d6c223e-5660-d58b-f824-5b0d1ccb2280','
45d63d10-6431-70f9-db94-5b0d1c6a2adf','
5edc9b5d-cf52-961e-632b-5b0d1c9f48eb','
7746adb7-8ade-06a0-c4bb-5b0d1c1c79a7','
90e94b10-9357-905a-0f70-5b0d1cbef644','
af6df7fc-7f8c-4c13-93ca-5b0d1cc078c2','
c8550e4c-4dc2-f18e-18fb-5b0d1cd08538','
e022e944-bcf5-71ab-d4c5-5b0d1c3c7d76','
5a180d2a-4180-a1c8-4908-5b0d1cc6ea5c','
1afe5e32-1ec6-012f-e23b-5b0d1cc84abc','
30f76bfc-7392-e4e9-9196-5b0d1cc4beae','
48c5434a-80a6-ac73-c4f2-5b0d1c88b347'


);








foreach($arrayval as $val)
{
$mm=trim($val);
$query="SELECT *  FROM `te_pr_programs_te_te_semester_1_c`
RIGHT JOIN `te_subjects_master_te_te_semester_1_c`  ON te_pr_programs_te_te_semester_1_c.te_pr_programs_te_te_semester_1te_te_semester_idb=te_subjects_master_te_te_semester_1_c.te_subjects_master_te_te_semester_1te_te_semester_idb  WHERE te_pr_programs_te_te_semester_1_c.te_pr_programs_te_te_semester_1te_pr_programs_ida LIKE '$mm'";
	$result = $db->Query($query);


	while ($rowd =$db->fetchByAssoc($result)){
		//echo $m++;
		$id=$rowd['te_subjects_master_te_te_semester_1te_subjects_master_ida'];
		$m="UPDATE `te_subjects_master` SET `overall_passing_marks`='46' WHERE `id`='$id'";
		$db->Query($m);
	//print_r($rowd['te_subjects_master_te_te_semester_1te_subjects_master_ida']) ;
}

}
$arrxcx=array(
102dccd5-312e-1a6b-e67a-5afabf764a29,
a6136ee5-6b57-d366-4e71-5afabff69710,
c39e5fb4-3ce4-cefb-cb80-5afabf1a3052,
5135513a-3800-e153-29b8-5afabf26b715,
69b5d6c0-205f-31cb-9c46-5afac0aecd77,
70b4444e-a67e-89da-5b2c-5afabfe31d0d,
ecc50111-f832-e01c-2e2e-5afabffec843,
4a317919-90be-fd10-803c-5afac0970c1c,
70098c90-8015-abcd-5f70-5afac06e2280,
8d5b5fa2-d369-1ae5-58ad-5afac02509fa,
962007be-d704-46b3-ab22-5afac0602971,
455dcbdf-e881-29fd-60f4-5afac0e47c29,
67cac44b-a579-35ba-4e38-5afac0fffab0,
8b31d8d1-2fde-bd39-cc6e-5afac08a6fad,

);
?>
