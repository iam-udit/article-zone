package com.example.aemblog.core.models;

import com.example.aemblog.core.services.PostService;
import org.apache.sling.api.SlingHttpServletRequest;
import org.apache.sling.api.resource.Resource;
import org.apache.sling.models.annotations.DefaultInjectionStrategy;
import org.apache.sling.models.annotations.Model;
import org.apache.sling.models.annotations.injectorspecific.OSGiService;
import org.apache.sling.models.annotations.injectorspecific.ScriptVariable;
import org.apache.sling.models.annotations.injectorspecific.ValueMapValue;
import javax.annotation.PostConstruct;
import java.util.Collections;
import java.util.List;

@Model(
    adaptables = SlingHttpServletRequest.class,
    defaultInjectionStrategy = DefaultInjectionStrategy.OPTIONAL
)
public class PostListModel {

    @OSGiService
    private PostService postService;

    // Injected from component dialog properties (example)
    @ValueMapValue
    private String parentPagePath; // Path to look for post CFs, e.g., /content/dam/aemblog/posts

    @ValueMapValue(name = "limit")
    private int postsLimit = 10; // Default limit

    @ValueMapValue
    private String categoryId; // Optional filter by category ID (CF path)

    @ValueMapValue
    private String tagId; // Optional filter by tag ID (CF path)
    
    @ValueMapValue
    private String sortBy = "publicationDate"; // Default sort field

    @ValueMapValue
    private String sortOrder = "desc"; // Default sort order


    private List<Resource> posts;
    private long totalPosts;

    @PostConstruct
    protected void init() {
        if (postService != null && parentPagePath != null) {
            // Note: ResourceResolver should be obtained from the request or a service user
            // For simplicity here, we'd need to adapt the actual PostService to handle this.
            // This is a simplified example; actual service calls would need a ResourceResolver.
            // posts = postService.getPosts(getRequest().getResourceResolver(), parentPagePath, postsLimit, 0, categoryId, tagId, sortBy, sortOrder);
            // totalPosts = postService.getTotalPosts(getRequest().getResourceResolver(), parentPagePath, categoryId, tagId);
            
            // Placeholder until ResourceResolver is properly handled in service layer
            posts = Collections.emptyList(); 
            totalPosts = 0;

        } else {
            posts = Collections.emptyList();
            totalPosts = 0;
        }
    }

    public List<Resource> getPosts() {
        // In a real model, each Resource might be adapted to a PostTeaserModel
        return posts;
    }

    public long getTotalPosts() {
        return totalPosts;
    }
    
    public boolean isEmpty() {
        return posts.isEmpty();
    }

    // We would need access to SlingHttpServletRequest to get ResourceResolver.
    // One way is to inject it:
    // @ScriptVariable
    // private SlingHttpServletRequest request;
    // public SlingHttpServletRequest getRequest() { return request; }
    // Or adapt from Resource and pass resolver if available from context.
}
