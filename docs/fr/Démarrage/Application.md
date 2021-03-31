Authorization
Authorization is used to check if a user is allowed to perform some specific operations in the application.

ABP extends ASP.NET Core Authorization by adding permissions as auto policies and allowing authorization system to be usable in the application services too.

So, all the ASP.NET Core authorization features and the documentation are valid in an ABP based application. This document focuses on the features that added on top of ASP.NET Core authorization features.

Authorize Attribute
ASP.NET Core defines the Authorize attribute that can be used for an action, a controller or a page. ABP allows you to use the same attribute for an application service too.

Example:

using System;
using System.Collections.Generic;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Authorization;
using Volo.Abp.Application.Services;

namespace Acme.BookStore
{
    [Authorize]
    public class AuthorAppService : ApplicationService, IAuthorAppService
    {
        public Task<List<AuthorDto>> GetListAsync()
        {
            ...
        }

        [AllowAnonymous]
        public Task<AuthorDto> GetAsync(Guid id)
        {
            ...
        }

        [Authorize("BookStore_Author_Create")]
        public Task CreateAsync(CreateAuthorDto input)
        {
            ...
        }
    }
}
Authorize attribute forces the user to login into the application in order to use the AuthorAppService methods. So, GetListAsync method is only available to the authenticated users.
AllowAnonymous suppresses the authentication. So, GetAsync method is available to everyone including unauthorized users.
[Authorize("BookStore_Author_Create")] defines a policy (see policy based authorization) that is checked to authorize the current user.
"BookStore_Author_Create" is an arbitrary policy name. If you declare an attribute like that, ASP.NET Core authorization system expects a policy to be defined before.

You can, of course, implement your policies as stated in the ASP.NET Core documentation. But for simple true/false conditions like a policy was granted to a user or not, ABP defines the permission system which will be explained in the next section.

Permission System
A permission is a simple policy that is granted or prohibited for a particular user, role or client.

Defining Permissions
To define permissions, create a class inheriting from the PermissionDefinitionProvider as shown below:

using Volo.Abp.Authorization.Permissions;

namespace Acme.BookStore.Permissions
{
    public class BookStorePermissionDefinitionProvider : PermissionDefinitionProvider
    {
        public override void Define(IPermissionDefinitionContext context)
        {
            var myGroup = context.AddGroup("BookStore");

            myGroup.AddPermission("BookStore_Author_Create");
        }
    }
}
ABP automatically discovers this class. No additional configuration required!

You typically define this class inside the Application.Contracts project of your application. The startup template already comes with an empty class named YourProjectNamePermissionDefinitionProvider that you can start with.
