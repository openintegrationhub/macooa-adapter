# macooa-adapter

[macooa](https://macooa.com) has been designed as a full service suite for Small and Medium Sized Enterprises in order to steer business processes online. [macooa](https://macooa.com) comprises projectplans, projectcontrolling, worktimes, holidayplans, cockpit, cost benefit analysis, project organisation, CRM, client / contact data, sales-pipeline and many more. 

This **adapter** connects client and contact data being held in the CRM of [macooa](https://macooa.com) with third-party applications. With this **adapter** you are able to create different application flows. It supports **"Triggers"** (e.g. ``getPersonsPolling``, ``getOrganizationsPolling``) as well as **"Actions"** (e.g. ``insertPerson``, ``updateOrganization``, ``deletePerson``, etc.), therefore with this **adapter** you could both read and fetch data from [macooa](https://macooa.com) and write and save data in [macooa](https://macooa.com).

## Before you begin

Before you can use the component you **must be a registered macooa user**. Please visit the home page of [macooa](https://macooa.com) to sign up.
> Any attempt to reach [macooa](https://macooa.com) endpoints without registration will not be successful.

After you registered in [macooa](https://macooa.com) you have to retrieve your **Token** and your **Tenant** from [macooa](https://macooa.com).
> For activation you **have to be logged in**, then click onto ``Administration`` and under the menue item ```Unternehmensdaten``` click onto the tab ``Datenaustausch``. Once you are in ``Datenaustausch`` select ``Ja`` and save the settings. After that a table will be shown on the screen which outlines both, **Token** and **Tenant**.

![Administration](lib/api/macooa_activateDataExchange.png)

Once the activation is done you have access to **API Keys** which are required for an authentication when you make a request to [macooa](https://macooa.com).

## Actions and triggers
The **adapter** supports the following **actions** and **triggers**:

#### Triggers:

  - Get person - (```yyyPersonsPolling.js```)
  - Get organization - (```yyyOrganizationsPolling.js```)

<!--

  - Get persons - polling (```getPersonsPolling.js```)
  - Get organizations - polling (```getOrganizationsPolling.js```)
  - Get deleted persons - polling (```getDeletedPersonsPolling.js```)
  - Get deleted organizations - polling (```getDeletedOrganizationsPolling.js```)

  All triggers are of type '*polling'* which means that the **trigger** will be scheduled to execute periodically. It will fetch only these objects from the database that have been modified or created since the previous execution. Then it will emit one message per object that changes or is added since the last polling interval. For this case at the very beginning we just create an empty `snapshot` object. Later on we attach ``lastUpdated`` to it. At the end the entire object should be emitted as the message body.
-->
#### Actions:

  - Insert person (```yyy.js```)
  - Insert organization(```yyyOrganization.js```)
  - Update person (```yyyPerson.js```)
  - Update organization (```yyyOrganization.js```)
  - Delete person (```yyyPerson.js```)
  - Delete organization (```yyyOrganization.js```)

<!--
  - Upsert person (```upsertPerson.js```)
  - Upsert organization(```upsertOrganization.js```)
  - Delete person (```deletePerson.js```)
  - Delete organization (```deleteOrganization.js```)
  - Update person's organizations (```updatePersonsOrganization.js```)
-->
**NOTE:** As mentioned before, to perform an action or a call trigger you have to be a registered [macooa](https://macooa.com) user and you have to pass your **API Key** (in [macooa](https://macooa.com) named **Token** and **Tenant**) when you send a request.
<!--
In each trigger and action, before sending a request we create a session in [Snazzy Contacts](https://snazzycontacts.com) via calling the function ```createSession()``` from ```snazzy.js``` file, which is located in directory **utils**. This function returns a cookie which is used when we send a request to
[Snazzy Contacts](https://snazzycontacts.com).
-->
##### Get persons

Get person trigger (```yyyPersonsPolling.js```) performs a request which fetch all persons belonging to the given macooa tenant from [macooa](https://macooa.com).

##### Get organizations

Get organization trigger (```yyyOrganizationsPolling.js```) performs a request which fetch all organizations belonging to the given macooa tenant from [macooa](https://macooa.com).
<!--
##### Get deleted persons

Get deleted persons trigger (```getDeletedPersonsPolling.js```) fetches all persons which have recently been deleted.

##### Get deleted organizations

Get deleted organizations trigger (```getDeletedOrganizationsPolling.js```) fetches all organizations which have recently been deleted.
-->
##### Insert person

Insert person action (``yyyPerson.js``) inserts a new person into the given macooa tenant [macooa](https://macooa.com).

##### Insert organisation

Insert person action (``yyyPerson.js``) inserts a new organisation into the given macooa tenant [macooa](https://macooa.com).

##### Update person

Update person action (``yyyPerson.js``) updates an existing person using the given macooa tenant in [macooa](https://macooa.com).

##### Update organisation

Update person action (``yyyPerson.js``) updates an existing organisation using the given macooa tenant in [macooa](https://macooa.com).

##### Delete person

Delete person action (``yyyPerson.js``) deletes an existing person using the given macooa tenant in [macooa](https://macooa.com).

##### Delete organisation

Delete person action (``yyyPerson.js``) deletes an existing organisation using the given macooa tenant in [macooa](https://macooa.com).

***

## License

Apache-2.0 © [macooa GmbH](https://macooa.com/)
