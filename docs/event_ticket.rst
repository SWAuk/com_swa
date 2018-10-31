How to create a Ticket Type for an Event?
=========================================
 
1. Log into website admin backend
2. Go to Components -> SWA -> Event Tickets
3. Click New
4. Choose the event from the dropdown list
5. Enter a name for the ticket
6. Enter the max number of this type of ticket that are available for sale
7. Enter the price of the ticket in pounds (i.e 5 for £5 or 12.99 for £12.99)
8. Enter any notes that you want displaying next to the ticket
9. Details is a JSON string describing who can buy the ticket, who the ticket is visible for and any ticket addons. 
   More info on ticket details below.


Event Ticket Details JSON
-------------------------

==============  ===============================
  Key              Value
==============  ===============================
visible         | Sets who can see the ticket - this is not the same as who can buy a ticket. 
                  You might be able to see a ticket that you can't buy. 
          
                | Possible values: `"All"`, `"Match"`, `"Committee"`, `"None"`
          
                | `"All"` - Visible to everyone regardless of whether or not they can buy the ticket.
                | `"Match"` - You can only see this ticket if you can buy the ticket OR you are SWA committee.
                | `"Committee"` - You can only see this ticket if you are SWA committee.
                | `"None"` - No one can see this ticket - useful if that ticket type is no longer available 
                  to (i.e. earlybird) but you don't want delete otherwise people will lose the ticket type 
                  they have bought.

                | Defaults value: `"All"`
--------------  -------------------------------
xswa            | Sets whether or not XSWA members can buy this ticket.
                  Does not prevent SWA members from buying the ticket though.

                | Possible values: `true`, `false`

                | Default value: `false`
--------------  -------------------------------
qualification   | Sets whether or not a qualification is needed to buy this ticket.

                | Possible values: `true`, `false`

                | Default value: `false`
--------------  -------------------------------
committee       | Sets whether or not you need to be SWA committee to buy this ticket.

                | Possible values: `true`, `false`

                | Default value: `false`
--------------  -------------------------------
member          | Member is an object containing two lists of member ids, a whitelist and a blacklist.

                | The whitelist lists the member ids that are allowed to buy this ticket, 
                  all other members aren't.
                | The blacklist lists the member ids that aren't allowed to buy this ticket, 
                  all other members can.

                | Default value: `{"whitelist": [], "blacklist": []}`
--------------  -------------------------------
university      University is an object containing two lists of university ids, 
                a whitelist and a blacklist.

                | The whitelist lists the university ids that are allowed to buy this ticket, 
                  all other universities aren't.
                | The blacklist lists the university ids that aren't allowed to buy this ticket, 
                  all other universities can.

                | Default value: `{"whitelist": [], "blacklist": []}`
--------------  -------------------------------
addons          | Addons is a lists of objects describing the available addon(s) available for this ticket.

                Each addon object must be in the following format::

                  {
                    "name": "<addon name>", 
                    "description": "<short description to display next to addon>", 
                    "options": "<null or an option object>",
                    "price": <addon price>
                  }
				
                | Currently members can only buy 0 or 1 addon. 
                  We will look to improve this by adding a `qty` key to the addon object.
		
                | Default value: `[]`
==============  ===============================