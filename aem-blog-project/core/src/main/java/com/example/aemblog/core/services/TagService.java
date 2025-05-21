package com.example.aemblog.core.services;

import org.apache.sling.api.resource.Resource;
import org.apache.sling.api.resource.ResourceResolver;
import java.util.List;

public interface TagService {
    List<Resource> getTags(ResourceResolver resourceResolver, String parentPath);
    Resource getTagByName(ResourceResolver resourceResolver, String parentPath, String tagName);
    Resource getTagById(ResourceResolver resourceResolver, String tagFragmentPath); // Path to the tag CF
}
