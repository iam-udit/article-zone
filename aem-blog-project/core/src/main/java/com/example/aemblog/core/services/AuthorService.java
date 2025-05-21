package com.example.aemblog.core.services;

import org.apache.sling.api.resource.Resource;
import org.apache.sling.api.resource.ResourceResolver;

public interface AuthorService {
    Resource getAuthorProfileByLegacyId(ResourceResolver resourceResolver, String authorProfilesParentPath, String legacyUserId);
    Resource getAuthorProfileByPath(ResourceResolver resourceResolver, String authorProfilePath);
    // String getAuthorName(Resource resource); // Utility to get name from profile resource
}
