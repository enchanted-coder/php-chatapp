const validation = new JustValidate("#signup");

validation
	.addField("#name", [
		{
			rule: "required"
		}
	])
	.addField("#email", [
		{
			rule: "required"
		},
		{
			rule: "email"
		}
	])
	.addField("#password", [
		{
			rule: "required"
		},
		{
			rule: "password"
		}
	]);
