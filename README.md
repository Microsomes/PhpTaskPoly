

I did not follow naming convention for models/table, for breedable,userable,parkable i avoided the s for all 3 tables, in my head it sounded less confusing.

Code test:


8) Create update your API handler which will return a given breed and add the data for all the users and 
parks which are attached to that breed


^ i did not understand what this meant, ive created the routes as suggested such as associate, created the poly many-to-many relationsips of user, breed, and park


all the relationships are setup correctly for querying with graphql such as 

{
	user(id:3){
		name
		breeds{
			id
			name
		}
		parks{
			id
			name
		}
	}
	
}

^grabs user 3 and all associated breeds and parks


{
	
	park(id:3){
		id
		breeds{
			id
		}
		
	}
}

^grabs park 3 with all its associated breeds

